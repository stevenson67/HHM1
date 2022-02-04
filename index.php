<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<!-- шапка -->
<div class="header__intro">
		<div class="container">
			<div class="logo"><a href="#"><img src="img/hhm.png"></a></div>
		</div>

		<div class="container">
			<div class="icon text-center"><img src="img/ContactIcon.png"></div>	
		</div>

		<!-- форма -->
		 <div class="container">
			<form id="form" class="row mt-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="wrapper">
								<label for="name" class="form-label">Имя <span class="symbol">*</span></label>
								<i class="fa fa-check fa-2x my-icon" aria-hidden="true"></i>
								<input name="name" type="text" class="form-control" id="name" maxlength="15" required>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="wrapper">
								<label for="email" class="form-label">Email <span class="symbol">*</span></label>
								<i class="fa fa-check fa-2x my-icon" aria-hidden="true"></i>
								<input name="email" type="text" class="form-control" id="email" maxlength="30" required>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					<div class="row">
						<div class="wrapper">
							<label for="comment" class="form-label">Коментарий <span class="symbol">*</span></label>
							<textarea name="comment" class="form-control" id="comment" maxlength="250" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="button">
					<div class="d-grid gap-2 d-md-flex justify-content-md-end">
						<button class="btn btn-danger btn-lg me-md-2" id="submit" type="submit">Записать</button>	
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<section class="section">
	<div class="container">
		<h1>Выводим коментарии</h1>
	</div>
	<!-- вывод карточек -->
	<div class="container">
		<div class="row my-cards d-flex align-items-center justify-content-start flex-wrap" id="cards"></div>
	</div>
</section>

<!-- footer -->
<footer class="footer">
	<div class="container">
		<img src="img/hhm.png" class="logo">
		<div class="footer-content-right">
			<a href="#"><img src="img/vk.png" class="icon-style" alt="VK"></i></a>
			<a href="#"><img src="img/facebook.png" class="icon-style" alt="Facebook"></a>
		</div>
	</div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/common.js"></script>
</body>
</html>