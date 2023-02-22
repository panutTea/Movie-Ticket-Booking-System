<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Movie Seat Booking</title>
  </head>
  <body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
	function confirmation() {
		Swal.fire({
			icon: 'success',
			title: "จองสำเร็จ !"
		}).then(function() {
		window.location = "tickets.php";
		});
	}
	function warning() {
		Swal.fire({
			icon: 'error',
			title: "ผิดพลาด !",
			text:"กรุณาจองที่นั่ง"
		});
	}
	function unsuccess() {
		Swal.fire({
			icon: 'error',
			title: "ผิดพลาด !",
			text:"ที่นั่งที่คุณเลือกถูกจองไปแล้ว"
		});
	}
	function cleckSelectd(x){
			var ID_X = document.getElementById(x);
			return ID_X.classList.contains("selected");
	}
	function login_alert() {
		Swal.fire("กรุณา login ก่อนเข้าใช้งาน !").then(function() {
			window.location = "login.php";
	});
	}
	</script>
	<?php require 'connect.php';
		session_start();
		$id_user="";
		if(!in_array(true,$_SESSION)){
			echo "<script>login_alert();</script>";
		}
		else{
			$id_user=$_SESSION['id_user'];
		}
		$id_movie=$_GET['id_movie'];
	?>
  <form method = "post">
    <div class="movie-container">
    <label>เลือกรอบที่จะดู </label><nobr>
      <select id = "date" name = "date">
				<option value="" disabled="disabled" selected="selected">เลือกวันที่</option>
				<?php
					$sql ="
						select DISTINCT date 
				from time 
				where id_movie = '$id_movie'
					";
					$query=mysqli_query($conn,$sql)or die("Error Query[".$sql."]");
					while ($result = mysqli_fetch_array($query)) {

				?>
					<option value=<?php echo $result["date"]; ?>><?php echo $result["date"]; ?></option>
				<?php
					}
				?>
				</select>
				<script type="text/javascript">
					document.getElementById('date').value = "<?php echo $_POST['date'];?>";
				</script>
        
				<script>
					document.getElementById("date").addEventListener("change", printMsg);
					function printMsg() {
						document.getElementById("trigger").click();
					}
				</script>
			<input type="submit" hidden="true" value="ตรวจ" id="trigger" />

		  <select id = "round" name = "round">
					<option value="" disabled="disabled" selected="selected">เลือกเวลา</option>
				<?php

					$date=$_POST['date'];
					$round_sql ="
						select round 
						from time 
						where date = '$date'
					";
					$round_query=mysqli_query($conn,$round_sql)or die("Error Query[".$round_sql."]");
					while ($round_result = mysqli_fetch_array($round_query)) {

				?>
					<option value=<?php echo $round_result["round"]; ?>><?php echo $round_result["round"]; ?></option>
				<?php
					}
				?>
				</select>
				<script type="text/javascript">
					document.getElementById('round').value = "<?php echo $_POST['round'];?>";
				</script>
				<script>
					document.getElementById("round").addEventListener("change", printMsg);
					function printMsg() {
						document.getElementById("trigger").click();
					}
				</script>
				

    </div>
    

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>ว่าง</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>เลือกอยู่</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>ขายแล้ว</small>
      </li>
    </ul>
    <div class="container">
      <div class="screen"></div>
		
      <div class="row">
        <div class="seat" id = "1"></div>
        <div class="seat" id = "2"></div>
        <div class="seat" id = "3"></div>
        <div class="seat" id = "4"></div>
        <div class="seat" id = "5"></div>
        <div class="seat" id = "6"></div>
        <div class="seat" id = "7"></div>
        <div class="seat" id = "8"></div>
      </div>

     
    
      <div class="row">
        <div class="seat" id = "9"></div>
        <div class="seat" id = "10"></div>
        <div class="seat" id = "11"></div>
        <div class="seat" id = "12"></div>
        <div class="seat" id = "13"></div>
        <div class="seat" id = "14"></div>
        <div class="seat" id = "15"></div>
        <div class="seat" id = "16"></div>
      </div>
   
      <div class="row">
        <div class="seat" id = "17"></div>
        <div class="seat" id = "18"></div>
        <div class="seat" id = "19"></div>
        <div class="seat" id = "20"></div>
        <div class="seat" id = "21"></div>
        <div class="seat" id = "22"></div>
        <div class="seat" id = "23"></div>
        <div class="seat" id = "24"></div>
      </div>
    </div>
	
	<?php
			
			if(isset($_POST['round']) and isset($_POST['date'])){
				$round = $_POST['round'];
				$date =$_POST['date'];
				$idR_sql="select id_round from time where id_movie = '$id_movie' and date = '$date' and round = '$round' ";
				$idR_result=mysqli_query($conn,$idR_sql);
				
				
				if(mysqli_num_rows($idR_result)>0){
					
					$idR_record = mysqli_fetch_array($idR_result, MYSQLI_ASSOC);
					$id_round = $idR_record['id_round'];
					
					$list_seat="	SELECT * 
								FROM seat where id_round = '$id_round'
							";
					$list_seat_result=mysqli_query($conn,$list_seat);
					
					if($list_seat_result){
						
							while($seat_record=mysqli_fetch_array($list_seat_result, MYSQLI_ASSOC)){
								?>
								<script>
									function addSold(x){
										var ID_X = document.getElementById(x);
										ID_X.classList.add('sold');
				
									}
								</script>
								<?php
								$num = $seat_record['seat_no'];
								echo "<script>addSold('$num');</script>";
							}
					}
				}
			}
			
			
				
		?>
    <p class="text">
      ที่นั่งที่เลือกแล้ว <span id="count">1</span> ราคาที่ต้องจ่าย <span
        id="total"
        >0</span> บาท
    </p>
    <script>
		const container = document.querySelector(".container");
		const seats = document.querySelectorAll(".row .seat:not(.sold)");
		const count = document.getElementById("count");
		const total = document.getElementById("total");
		const movieSelect = document.getElementById("round");
		
		populateUI();

		let ticketPrice = +300;

		// Save selected movie index and price
		function setMovieData(movieIndex, moviePrice) {
		  localStorage.setItem("selectedMovieIndex", movieIndex);
		  localStorage.setItem("selectedMoviePrice", moviePrice);
		}

		// Update total and count
		function updateSelectedCount() {
		  const selectedSeats = document.querySelectorAll(".row .seat.selected");

		  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

		  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

		  const selectedSeatsCount = selectedSeats.length;

		  count.innerText = selectedSeatsCount;
		  total.innerText = selectedSeatsCount * ticketPrice;

		  setMovieData(movieSelect.selectedIndex, 300);
		}


		// Get data from localstorage and populate UI
		function populateUI() {
		  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

		   if (selectedSeats !== null && selectedSeats.length > 0) {
			seats.forEach((seat, index) => {
			  /*if (selectedSeats.indexOf(index) > -1) {
				seat.classList.add("selected");
			  }*/
			});
		  }

		  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

		  if (selectedMovieIndex !== null) {
			movieSelect.selectedIndex = selectedMovieIndex;
		  }
		}

		// Movie select event
		movieSelect.addEventListener("change", (e) => {
		  ticketPrice = +e.target.value;
		  setMovieData(e.target.selectedIndex, e.target.value);
		  updateSelectedCount();
		});

		// Seat click event
		container.addEventListener("click", (e) => {
		  if (
			e.target.classList.contains("seat") &&
			!e.target.classList.contains("sold") &&
			movieSelect.value != ""
		  ) {
			e.target.classList.toggle("selected");

			updateSelectedCount();
		  }
		});

		// Initial count and total set
		updateSelectedCount();
		function buyTicket(){
			let n = 0;
			let arr = ""
			for (let i = 1; i <= 24; i++) {
				var seat_i = document.getElementById(i);
				if(seat_i.classList.contains("selected")){
					arr += "&arr[]="+i;
					n+=1;
				}
			}
			arr = "n="+n+arr;
			
			document.getElementsByName("subEnd")[0].value = arr;
		}
	</script>
	<p id="demo"></p>
    <button name = "subEnd" id = "subEnd" class="button button1" onclick="buyTicket()">จองที่นั่ง</button>
    </form>
	<a  href='index.php' class= 'button button1' >ยกเลิกการจอง</a>
	<?php if(isset($_POST['subEnd'])){
		$url = $_POST['subEnd'];
		parse_str($url, $output);
		mysqli_begin_transaction($conn);
		$sum=0;
		if($output['n']>0){
			for ($i = 0; $i < $output['n']; $i++){
				$op = $output['arr'][$i];
				$seat_sql = "INSERT INTO seat(price, id_round, id_user, seat_no) VALUES (300,$id_round,'$id_user',$op)";
				$seat_result=mysqli_query($conn, $seat_sql);
				if($seat_result){
					$sum++;
				}
			}
			if($sum==$output['n']){
				mysqli_commit($conn);
				echo "<script>confirmation();</script>";
			}
			else{
				mysqli_rollback($conn);
				echo "<script>unsuccess();</script>";
			}
		}else{
			echo "<script>warning();</script>";
		}
	}
	?>
  </body>
</html>
