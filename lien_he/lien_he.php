<h1 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Best city bikes</a></h1>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Mountain bikes for beginners</a></h2>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Women’s cycling apparel</a></h2>
<div class="page-wrapper">
	<main class="main">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="home"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact</li>
				</ol>
			</div>
		</nav>
		<div class="container contact-us-container">
			<div class="contact-info">
				<div class="row">
					<div class="col-12">
						<h2 class="ls-n-25 m-b-1" style="margin-top: 50px;">
							Contact Information
						</h2>
						<?php
						require('db.php');
						$query = "SELECT * FROM tin_thicong WHERE thuocloai=2 AND id IN (1, 2, 3, 4)";
						$result = mysqli_query($link, $query);
						$contact_info = [];
						while ($row = mysqli_fetch_assoc($result)) {
							$contact_info[$row['id']] = $row['mota'];
						}
						?>
						<p>
							<?php echo $contact_info[1] ?? ''; ?>
						</p>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="feature-box text-center">
							<i class="fa fa-map-marker"></i>
							<div class="feature-box-content">
								<h3>Address</h3>
								<h5><?php echo $contact_info[2] ?? ''; ?></h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="feature-box text-center">
							<i class="fa fa-mobile-alt"></i>
							<div class="feature-box-content">
								<h3>Phone Number</h3>
								<h5><?php echo $contact_info[3] ?? ''; ?></h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="feature-box text-center">
							<i class="far fa-envelope"></i>
							<div class="feature-box-content">
								<h3>Email Address</h3>
								<h5><a href="mailto:<?php echo $contact_info[4] ?? ''; ?>" class="__cf_email__" data-cfemail="7e0e110c0a113e0e110c0a110a161b131b501d1113" style="color: #000;"><?php echo $contact_info[4] ?? ''; ?></a></h5>
							</div>
						</div>
					</div>

					<div class=" col-sm-6 col-lg-3">
						<div class="feature-box text-center">
							<i class="far fa-calendar-alt"></i>
							<div class="feature-box-content">
								<h3>Working Days/Hours</h3>
								<h5>Monday - Sunday / 9:00AM - 8:00PM</h5>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<h2 class="mt-6 mb-2">Send Us a Message</h2>
					<form class="mb-0" action="#">
						<div class="form-group">
							<label class="mb-1" for="contact-name">Your Name
								<span class="required">*</span></label>
							<input type="text" class="form-control" id="contact-name" name="contact-name"
								required />
						</div>
						<div class="form-group">
							<label class="mb-1" for="contact-email">Your Email
								<span class="required">*</span></label>
							<input type="email" class="form-control" id="contact-email" name="contact-email"
								required />
						</div>
						<div class="form-group">
							<label class="mb-1" for="contact-message">Your Message
								<span class="required">*</span></label>
							<textarea cols="30" rows="1" id="contact-message" class="form-control"
								name="contact-message" required></textarea>
						</div>

						<div class="form-footer mb-0">
							<button type="submit" class="btn btn-dark font-weight-normal">
								Send Message
							</button>
						</div>
					</form>
				</div>
				<div class="col-lg-6">
					<h2 class="mt-6 mb-1">Store Address</h2>
					<div id="accordion">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2919.743076153741!2d-85.6508990234731!3d42.962618396820694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8819ada698d73735%3A0xb7beb8f6036079d6!2s826%20Fulton%20St%20E%2C%20Grand%20Rapids%2C%20MI%2049503%2C%20USA!5e0!3m2!1sen!2s!4v1726717238097!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>

		<div class="mb-8"></div>
	</main>
</div>