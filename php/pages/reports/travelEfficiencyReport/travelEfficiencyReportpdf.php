<?php

	
	  $date = date("d-M-y");
	  $dt = new DateTime();
	 $dated = $dt->format("Y-m-d-H-i-s");
	  $VisitDate = $_GET["VisitDate"];
	 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/reports/wrapcell.php');
	 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
	$pdf=new PDF_MC_Table('L','cm',"Legal");
	$pdf->Open();
	$pdf->AddPage();
	$pdf->AliasNbPages();
	
	$pdf->SetFont('times','B',12);
	$pdf->Cell(0,0.9,'JINDAL POLYBUTTONS LTD',0,1,'C');
	$pdf->Cell(0,1,'TRAVEL EFFICIENCY REPORT ',0,1,'C');
	$clientName=null;
	$clientLocation=null;
	$empId = $_GET["empId"];
	$pdo = Database::connect(); 
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$empname = $pdo->prepare("SELECT EMP_NAME FROM  EMP_DETAILS WHERE ID = $empId");
	$empname->execute();
	$emprow = $empname->fetch();
		$pdf->Cell(0,1.5,'PARAMETERS:',0,1,'L');
		$pdf->Cell(3.3,1,'Employee Name:',0,0,'R');
		$pdf->Cell(5,1,$emprow['EMP_NAME'], 0, 0,'L');
		$pdf->Cell(23,1,"Report Date:",0,0,'R');
		$pdf->Cell(0,1,$date,0,0);
		$pdf->Cell(-31.4,2,"Visit Date:",0,0,'R');
		$pdf->Cell(0,2,$VisitDate,0,0);		
		$pdf->SetFont('times','B',8);
		$pdf->Ln();	
			

    	$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$trackLocRecords = $pdo->prepare("SELECT * FROM  EMP_TRACKED_LOC WHERE EMP_ID = $empId AND TRACK_DATE = IFNULL((str_to_date('$VisitDate','%d-%b-%y')),
		TRACK_DATE )ORDER BY ID ASC");
        $trackLocRecords->execute();	

		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$clientRecords = $pdo->prepare("SELECT * FROM  CLIENT_DETAILS where :tracked_lng between MINLON and MAXLON and :tracked_lat between MINLAT and MAXLAT ");
	    	
		$pdf->SetFont('times','B',12);
		$pdf->SetWidths(array(5, 5, 5, 5, 5, 5));
		$pdf->Row(array("Client Name", "Location", "Entry Time", "Exit Time", "Total Visit Time", "Travel Time"));

		$employeefound =0;
		$prevclientid =0;
		for($i=0; $row = $trackLocRecords->fetch(); $i++)
		{
		    $RecordId      = $row['ID'];
            $loclatcurrent = $row['TRACK_LAT'];
			$loclngcurrent = $row['TRACK_LNG'];	
			$timecurrent   = $row['TRACK_TIME']; 
		    if ($i == 0)
			{
			    $RecordId    = $row['ID'];
				$loclatstart = $row['TRACK_LAT'];
				$loclngstart = $row['TRACK_LNG'];
				$startTime   = $row['TRACK_TIME'];
				$clientFound = 0;
				
				$clientRecords->bindParam(':tracked_lng', $loclngcurrent);  //check employee longitude in the client min longitude and max longitude 
				$clientRecords->bindParam(':tracked_lat', $loclatcurrent); //check employee latitude in the client min latitude and max latitude 
				$clientRecords->execute();						
				$firstrow = $clientRecords->fetch(); 
				if($firstrow>0)    
				{		   
				  $entryTime = $row["TRACK_TIME"];                        //get track time from the employee table to store entry time
				  $clientName = $firstrow["CLIENT_NAME"];                 //get client name from the client details table to store client time
				  $clientLocation = $firstrow["CLIENT_LOC"];			  //get client location from the client details table to store client location	   
				  $clientFound = 1;				
				  $prevclientid = $firstrow['ID'];	                       //get client id from the client details table to store previous client id
					
				}
			   else
			    {
				  $prevclientid =0;
				   $clientFound = 0;
				  //echo  "Location not identified <br>";
			    }
			   
			}
			else
			{	  

			    $clientRecords->bindParam(':tracked_lng', $loclngcurrent);
				$clientRecords->bindParam(':tracked_lat', $loclatcurrent);
				$clientRecords->execute();						
				$currentrow = $clientRecords->fetch();
                $currentid = $currentrow["ID"];							
				if ($currentrow["ID"]==$prevclientid)                   //check current client id and previous client id is to same
				{
				    null; 
					//echo "same location";
					
				}
				else 
				{
  				    if ($clientFound == 1)
				    {
			           $exitTime = $timeprev;					  				 
					   $StayTime = number_format(((strtotime($exitTime) - strtotime($entryTime)) / 60), 2, '.', ''); //calculate stay time
					   $TravelTime =number_format(((strtotime($entryTime) - strtotime($startTime)) / 60), 2, '.', ''); // calculate travel time					   
					   $pdf->SetFont('times','',10);
					   $pdf->Row(array("$clientName","$clientLocation","$entryTime ","$exitTime ","$StayTime","$TravelTime"));			        			        
					   $entryTime = null;                               
					   $startTime = $exitTime;
					}   					   
					$clientFound = 0;					  
					if($currentrow>0)
					{
			            $entryTime = $row["TRACK_TIME"];	 
				        $clientFound = 1;
						$clientName = $currentrow["CLIENT_NAME"];
						$clientLocation = $currentrow["CLIENT_LOC"];							  
                        $prevclientid = $currentrow['ID'];
		
					}
				    else
					{
						null;
						$prevclientid = 0;
						 //echo  "Location not identified <br>";
					}
			            
				   
			    }
            }
            $timeprev   = $row['TRACK_TIME'];
            $employeefound =1;
		}
        if($employeefound==0)		
		{
		 $report=array("","","**No Data found**");
		 $excel->writeLine($report);
		}
		
	if($employeefound==1)
	{
		if ($clientFound == 1)
			{
			   $exitTime = $timeprev;					  					 
			   $StayTime = number_format(((strtotime($exitTime) - strtotime($entryTime)) / 60), 2, '.', '');
			   $TravelTime = number_format(((strtotime($entryTime) - strtotime($startTime)) / 60), 2, '.', '') ;
			   //print excel report
			   $pdf->Row(array("$clientName","$clientLocation","$entryTime ","$exitTime ","$StayTime","$TravelTime"));
			   //------------//
			   $entryTime = null;
			   $startTime = $exitTime;
			}
	}
        $filename="travelEfficiencyReport".$dated.".pdf";
		$pdf->Output($filename,'F');

			echo '<script type="text/javascript">
							window.location.href ="travelEfficiencyReport'.$dated.'.pdf";
							</script>';
	
?>