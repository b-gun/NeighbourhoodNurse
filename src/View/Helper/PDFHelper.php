<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Error\Debugger;

class PDFHelper extends Helper
{
    function ColouredTable($header, $data)
    {
        // Header
        $w = array(200,250,300,200);
        $num_headers = count($header);
        $tbl = '<table cellpadding="5" cellspacing="5" border="0">';
        $tbl.='<tr bgcolor="#729B78">';
        for($i = 0; $i < $num_headers; ++$i)
        {
            $tbl.='<td class="heading" width="'.$w[$i].'">'.$header[$i].'</td>';
        }
        $tbl.="</tr>";

        //$fill=0;
        $rowCount=0;
/*
        foreach($data as $row)
        {

            if($rowCount==0)
            {
                $tbl.="<tr valign=\"top\" bgcolor=\"#D8F2D0\">";
            }
            else
            {
                $tbl.="<tr valign=\"top\">";

            }
            $tbl.="<td>".$row['patient_id']."</td>";
          $tbl.="<td>".$row['date']."</td>";
         $tbl.="<td>".$row['cust_street'].'<br />'.$row['cust_suburb']." ".$row['cust_state']."<br />".$row['cust_postcode']."</td>";
           $tbl.="<td>".$row['start_time']."</td>";
           $tbl.="<td>".$row['end_time']."</td>";
		
		$tbl.= "<td></td><td></td><td></td>";

            $tbl.="</tr>";
            $rowCount++;

        } */

	$tbl.= "<tr><td>".$data[patient_id]."</td>";
     $tbl.= "<td>".$data[date]."</td>";
	$tbl.= "<td>".$data[start_time]."</td>";
     $tbl.="<td>".$data[end_time]."</td></tr>";


        $tbl.="</table>";

	
        return $tbl;

        //$this->Cell(array_sum($w), 0, '', 'T');
    }
}

?>



