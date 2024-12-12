<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>NFT MAX - NFT Dashboard Template</title>
		
		<!-- Fav Icon -->
		<link rel="icon" href="img/favicon.png">
		
		
		<!-- NFTMax Stylesheet -->
        @vite([
			'resources/css/bootstrap.css',
            'resources/css/font-awesome.css',
            'resources/css/reset.css',
            'resources/css/style.css',
            ])


	</head>
	<body>	
		<div class="body-bg" style="background-image:url('img/body-bg.jpg')">
		
			<!-- NFTMax Welcome -->
			<section class="nftmax-wc nftmax-wc__full">
				<div class="container-fluid">
					<div class="row g-0">
						<div class="col-xxl-6 col-lg-6 col-12 nftmax-hidden-rp">
							<div class="nftmax-wc__inner nft-gr-primary">
								<!-- Logo -->
								<div class="nftmax-wc__logo">
									<a href="index.html"><img src="img/logo.png" alt="#"></a>
								</div>
								<!-- Middle Image -->
								<div class="nftmax-wc__middle">
									<a href="index.html"><img src="img/welcome-vector.png" alt="#"></a>
								</div>
								<!-- Welcome Heading -->
								<div class="nftmax-wc__heading">
									<h2 class="nftmax-wc__title">Welcome to TimeControl <br> Control Panel</h2>
								</div>
								
							</div>
						</div>
						<div class="col-xxl-6 col-lg-6 col-12">
							<!-- Welcome Form -->
							<div class="nftmax-wc__form">
								<div class="nftmax-wc__form-inner">
									<div class="nftmax-wc__heading">
										<h3 class="nftmax-wc__form-title nftmax-wc__form-title__one" style="background-image:url('img/heading-vector.png')">Log in</h3>
									</div>
									<!-- Sign in Form -->
									<form class="nftmax-wc__form-main" action="{{ route('login-post') }}" method="post">
                                        @csrf
										<div class="form-group">
											<label class="nftmax-wc__form-label">DNI</label>
											<div class="form-group__input">
												<span class="nftmax-wc__icon"><svg class="inline" width="18" height="21" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
													<path fill="#858D98" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
												</svg></span>
												<input class="nftmax-wc__form-input" type="text" name="DNI" placeholder="123-456-78">
											</div>
										</div>
										<div class="form-group">
											<label class="nftmax-wc__form-label">Password</label>
											<div class="form-group__input">
												<span class="nftmax-wc__icon"><svg class="inline" width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4467 7.1581V5.94904C14.4467 2.66455 11.7822 0 8.49771 0C5.21323 0 2.54867 2.66455 2.54867 5.94904V7.1581C1.00076 7.83194 -0.000366211 9.36059 -0.000366211 11.0471V16.149C0.0034843 18.494 1.90178 20.3961 4.25059 20.4H12.7525C15.0975 20.3961 16.9996 18.4978 17.0035 16.149V11.051C16.9919 9.36059 15.9908 7.83579 14.4467 7.1581ZM9.34482 14.451C9.34482 14.9207 8.96362 15.3019 8.49386 15.3019C8.0241 15.3019 7.6429 14.9207 7.6429 14.451V12.749C7.6429 12.2793 8.0241 11.8981 8.49386 11.8981C8.96362 11.8981 9.34482 12.2793 9.34482 12.749V14.451ZM12.7448 6.8H4.24289V5.94904C4.24289 3.60023 6.14505 1.69807 8.49386 1.69807C10.8427 1.69807 12.7448 3.60023 12.7448 5.94904V6.8Z" fill="#374557" fill-opacity="0.6"></path></svg></span>
												<input class="nftmax-wc__form-input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password-field" type="password" name="password" placeholder="" maxlength="8">
											</div>
										</div>
										<div class="form-group">
											<div class="nftmax-wc__check-inline">
												<div class="nftmax-wc__checkbox">
													<input class="nftmax-wc__form-check d-none" id="checkbox" name="checkbox" type="checkbox">
													<label for="checkbox" class="d-none">Remember Me</label>
												</div>
												<div class="nftmax-wc__forgot">
													<a href="forgot-password.html" class="forgot-pass">Forgot Password?</a>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="nftmax-wc__button">
												<button class="ntfmax-wc__btn" type="submit">Sign in</button>
											</div>
										</div>
									</form>	
									<!-- End Sign in Form -->
								</div>
							</div>
							<!-- End Welcome Form -->
						</div>
					</div>
				</div>
			</section>
			<!-- End NFTMax Welcome -->
			
		</div>
		@include('layouts.notifications')
	</body>
</html>