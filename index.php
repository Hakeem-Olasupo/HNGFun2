<?php
include_once("header.php");
?>

<style>
	.hero-sub-text-2{
		color: #2196F3 !important;
	}

	.text-primary{
		color: #2196F3 !important;
	}

	.btn-blue{
		background-color: #2196f3 !important;
	}
	#btn-signup:hover{
		background-color: #2AADFF !important;
         color: #ffffff !important;
         box-shadow: 0 0 10px #dbf4ff, 0 0 2px #5bc0de;
		-moz-transition: all 0.5s linear;
		-webkit-transition: all 0.5s linear;
		-o-transition: all 0.5s linear;
		transition: all 0.5s linear;
	}

	#btn-signup:focus {
			background-color: #dbf4ff !important;
			color: #000000 !important;
			border: none;
	}
	body{
		width: 100%;
	}
	.hero-sub-text-1 {
		font-size: 3rem;
	}
	@media (max-width: 599px) { 
		.hero-main-text {
			font-size: 7rem;
		}
		.hero-sub-text-2 {
			font-size: 1.5rem;
		}
		.text-desc {
			font-size: 1rem;
		}
	}
</style>
<div class="container">
	
		<div class="hero-div text-center bg-transparent col-md-12 col-sm-12 col-xs-12 mx-auto">
			<p class="hero-main-text font-weight-bold"> HNG</p>
			<p class="hero-sub-text-1 font-weight-bold"> Internship</p>
			<p class="hero-sub-text-2 text-primary mb-5"> Become a better Software Developer</p>
		</div>
		<div class="row">
			<div class="container container-fluid bg-transparent text-center col-md-12 col-sm-12 col-xs-12">
				<h2>What is HNG Internship ?</h2>
				<p class="text-secondary m-2 text-desc">The HNG is a 3-month remote internship program designed to locate the most 
				talented software developers in Africa. Everyone is welcome to participate 
				(there is no entrance exam). We create fun challenges every week on our slack channel. Those who solve 
				them stay on. Everyone gets to learn important concepts quickly, and make connections with people they 
				can work with in the future. The intern coders are introduced to complex programming frameworks, and get 
				to work on real applications that scale. the finalist are connected to the best companies in the tech 
				ecosystem and get full time jobs and contracts immediately.
				</p>
			</div>

			<div class="container container-fluid bg-transparent text-center col-md-12 col-sm-12 col-xs-12">
				<h2 class="mt-5">Why the HNG Internship ?</h2>
				<p class="text-secondary m-2 text-desc">We needed developers in Africa, and there were just not enough. We found 
				that telent was hiding in different small locations all over the country - but they needed training  
				and exposure to best practices. The initial idea was to simply do a remote internship to find coders. 
				We did not expect 1000+ people would apply to the internship. But we saw strongly people wanted to develop 
				their skills, and it became a mission for us to make this happen.
				</p>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="container container-fluid bg-transparent">
						<h3 class="text-center mt-5">Ready to get started?</h3>
						<div class="d-flex justify-content-center mt-3">
							<form action="send.php" method="post" id="newsletter" name="newsletter" class="">
								<label class="sr-only">Email:</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent font-icon" id="basic-addon1">@</span>
										</div>

										<input type="text" class="form-control rounded-right bg-transparent" placeholder="johndoe@example.com" aria-label="Username" aria-describedby="basic-addon1" style="border: 1px solid #bdbdbd;">
										<a href="https://join.slack.com/t/hnginternship4/shared_invite/enQtMzQwOTU4NzAwNjExLWQ0NWFlZDBmNjRkMTRkNGZmYjQ5MzA0YmUzZDBiZDEzOTBkZGE1ZWUxZTI1YjkxMTQ5N2MyZTMyMzBmMTEyOWM" class="home-signup-email-btn btn btn-blue btn-lg ml-3 rounded py-0" id="btn-signup">
										<p class="font-weight-normal mb-0 pt-2 mt-1 text-capitalize">Sign Up</p>
										</a>
									</div>
							</form>
						<!-- <a href="./sign-up.php">
							<button class="home-signup">
								SIGN UP
							</button>
						</a> -->
					</div>

				</div>
			</div>
		</div>
	
</div>
<script src="js/lib.js"></script>
<?php
include_once("footer.php");
?>
