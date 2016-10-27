<?php 

$this->layout = false;
echo $this->Html->css('receipt.css');

?>

<body>

<!-- This section comprises the 'header' of the receipt. -->

			<div class="logo">
				<?= $this->Html->image('logo.jpg', array('width'=>'200px')) ?>
				
				<!--<img src="logo.jpg" height="80" width="200">-->
			</div>

			<div class="header">
				<h1>Account/Receipt</h1>
			</div>

<!-- 		This section holds Customer Information, Invoice Information, Tax Invoice Number and Customer Number. PHP Queries replace the placeholder text (fetch from tables using SQL Queries via a form) -->
			<div class="persInfo">
			</br>
				<p>Ms. Rosemary Edith Coull</br> 
					Registered Nurse</br>
					Trading as Neighborhood Nurse</br>
					0430185652</br>
					rosecoull@optusnet.com.au</br>
				ABN: 377 605 760 27</p>
			</div>

			<div class="persAdd">
				<p>18 Purtell Street</br>
					Bentleigh East, 3165</br>
					www.neighbourhoodnurse.com.au<br>
					Registration: AHPRAA: NMW 0001347321
				</p>
			</div>

		<div class="invoice">
			<span name="Invoice To:">
					<div>
					<h4>Invoice To:</h4>
					<p>TANIA CLEARY - Care Coordinator	</br>
					The Salvation Army- ADULT Services</br>
					Community Aged Care Program</br>
					152 Churchill Avenue</br>
					Braybrook</br>
					Vic. 3019</p>
					</div>	
			</span>
		</div>

		<div class="invoicenum">
		<span name="Tax Invoice Number: 0039">
			<div>
				<h4>Tax Invoice Number: 0039</h4>
				<p>Period ending: <?php echo date("l, F jS Y", strtotime('now')); ?>
</br>
				Date Invoice Sent:<?php echo date("l, F jS Y", strtotime('now')); ?>

				</p>
			</div>
		</span>
		</div>

		<div class="custnum">

			<p></br>
			<?= $receipt->has('patient') ? h($receipt->patient->full_name) : '' ?></br>
			<?= $receipt->has('patient') ? h($receipt->patient->address1) : '' ?>
			<?= $receipt->has('patient') ? h($receipt->patient->address2) : '' ?>
			<?= $receipt->has('patient') ? h($receipt->patient->suburb) : '' ?>
			<?= $receipt->has('patient') ? h($receipt->patient->postcode) : '' ?>
			<?= $receipt->has('patient') ? h($receipt->patient->state) : '' ?>
			<?= $receipt->has('patient') ? h($receipt->patient->country) : '' ?>
		</div>

<!-- This section details the 'invoice' part of the receipt, laid out in a table. Fetch information from invoice tables in database. -->

		<div class="paymentmethod">
			<h4>Payment Method:</h4>
			<p> Visa ☐
				MasterCard ☐
				Amex ☐
				Bank Transfer ☐
				Cheque ☐
				Cash ☐
			</p>
		</div>

<!-- This section may require some code that auto-generates the rows of the table based on previous visits. It should also automatically generate two rows, one row for the notes and total amount, and the other for the signature. For the moment it contains dummy data. -->

		<div class="table">
			<table style="width:100%">

				<tr>
					<th>Patient Name</th>
					 <td><?= $receipt->has('patient') ? h($receipt->patient->full_name) : '' ?></td>
				</tr>
				<tr>
				<th>Date of Service</th>
				<td><?= h($receipt->date->format('d/m/y')) ?></td>
			    </tr>

			    <tr>
                  <th>Description of Service</th>
                  <td><?= h($receipt->comments) ?></td>
                </tr>

                <tr>
					<th>Price Per Hour</th>
					<td>$60</td>
				</tr>

				<tr>
				<th>Time In Minutes</th>

				<td><?= h($difference) ?></td>

			    </tr> 

			    <tr>
                 <th>Discount</th>
                 <td>0</td>
                </tr>

                <tr>
				<th>Total Charge per Visit</th>
				<td><?php echo'$'.($difference/60)*60?></td>
				</tr>

             

            <!--  <tr>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['service_date']; ?></td>
                    <td><?php echo $row['service_desc']; ?></td>
                    <td><?php echo '$'.$row['price_hour']; ?></td>
                    <td><?php echo $row['time_min']; ?></td>
                    <td><?php echo $row['discount']; ?></td>
                    <td><?php echo '$'.($row['price_hour']/60)*$row['time_min'] ?></td>
                </tr> 
                 -->
<!--
				<tr>
					<td>Micheal Belkin</td>
					<td>Wednesday 6th of April, 2015</td>
					<td>Nursing - Wound Managment</td>
					<td>$60</td>
					<td>30</td>
					<td>N/A</td>
					<td>$30</td>
				</tr>
				<tr>
					<td>Micheal Belkin</td>
					<td>Sunday 10th of April, 2015</td>
					<td>Nursing - Wound Managment</td>
					<td>$60</td>
					<td>30</td>
					<td>N/A</td>
					<td>$30</td>
				</tr>
-->
			</table>
		</div>


</body>
