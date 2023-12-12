<!DOCTYPE html>
  <html lang="en">

  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ 'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" type="text/css" href="{{ 'assets/js/select.dataTables.min.css' }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
  <style>
    /*
     Trending 

     inspired by my brother https://dribbble.com/shots/2479405-Day-69-Trending
*/
* {
  font-family: "Montserrat", sans-serif;
  box-sizing: border-box;
}

body,
html {
  margin: 0;
  padding: 0;
  font-size: 62.5%;
  background-color: #7e94d8;
  overflow-x: hidden;
}

.wrapper {
  margin: 120px 0;
}

.card {
  background-image: linear-gradient(159deg, #47455d 0%, #323045 97%);
  box-shadow: 0px 31px 35px 0px rgba(0, 0, 0, 0.38);
  width: 525px;
  height: 150px;
  margin: 0 auto 150px;
  position: relative;
  padding: 20px 40px;
}
.card:last-child {
  margin-bottom: 0;
}
.card__rank {
  box-shadow: 0px 16px 30px 0px rgba(0, 0, 0, 0.53);
  background: #9DD5FF;
  color: #fff;
  padding: 9px;
  font-size: 2.3rem;
  position: absolute;
  left: -20px;
  top: 20px;
  width: 45px;
  height: 45px;
  text-align: center;
  text-shadow: 0px 10px 20px #000000;
}
.card__title {
  font-size: 5rem;
  color: #FFFFFF;
  letter-spacing: 0.56px;
  line-height: 48px;
  text-shadow: 0px 14px 40px #000000;
  font-weight: 700;
  text-transform: uppercase;
  display: inline-block;
  z-index: 1;
  position: relative;
}
.card__date {
  font-size: 1.1rem;
  text-transform: uppercase;
  letter-spacing: 3.6px;
  color: rgba(255, 255, 255, 0.3);
  position: absolute;
  top: -28px;
  z-index: 1;
}
.card__image {
  width: 600px;
  position: absolute;
  top: -20px;
  right: -120px;
  z-index: 0;
}
.card__image:after {
  content: "";
  opacity: 0;
  transition: all 0.3s;
  left: 0;
  position: absolute;
  width: 150px;
  height: 150px;
  background-color: #fff;
  transform: rotate(45deg);
  transform-origin: 40px 240px;
  border-radius: 30% 34% 0 0;
  background: linear-gradient(to bottom, rgba(247, 231, 111, 0.65) 0%, rgba(0, 0, 0, 0) 100%);
}
.card__image img {
  width: 100%;
}
.card__details {
  font-size: 1.1rem;
  text-transform: uppercase;
  position: absolute;
  right: 30px;
  bottom: 30px;
  letter-spacing: 2px;
  z-index: 2;
}
.card__details a {
  color: rgba(255, 255, 255, 0.3);
  display: block;
  text-decoration: none;
}
.card__details a:hover {
  text-decoration: underline;
}
.card__shareStar {
  margin: 0;
  padding: 0;
  list-style: none;
  position: absolute;
  right: 25px;
  top: 25px;
  z-index: 1;
}
.card__shareStar li {
  display: inline-block;
  margin: 0;
  padding: 0;
  width: 30px;
}
.card__shareStar li:first-child {
  margin-right: 10px;
}
.card__shareStar li svg {
  width: 100%;
}
.card__shareStar li svg path {
  fill: rgba(255, 255, 255, 0.3);
}
.card__shareStar li svg polygon {
  stroke: rgba(255, 255, 255, 0.3);
}
.card__shareStar li:hover svg path,
.card__shareStar li:hover svg polygon {
  fill: #fff;
}
.card__shareStar li:hover svg polygon {
  stroke: #fff;
}
.card__voting {
  list-style: none;
  margin: 0;
  padding: 0;
  color: rgba(255, 255, 255, 0.3);
  font-size: 1.4rem;
  position: absolute;
  bottom: 30px;
  left: 43px;
  z-index: 1;
}
.card__voting li {
  transition: all 0.2s;
  margin: 0;
  padding: 0;
  position: relative;
  display: inline-block;
  padding: 6px 20px 0 33px;
}
.card__voting li:hover {
  cursor: pointer;
  color: #fff;
}
.card__voting li:hover svg {
  width: 100%;
}
.card__voting li:hover svg path {
  fill: #fff;
}
.card__votingIcon {
  position: absolute;
  left: 0;
  top: 0;
  width: 25px;
}
.card__votingIcon svg {
  width: 100%;
}
.card__votingIcon svg path {
  fill: rgba(255, 255, 255, 0.3);
}
.card__votingIcon svg circle {
  stroke: rgba(255, 255, 255, 0.3);
}
.card:hover .card__image:after {
  opacity: 1;
}

@media (max-width: 600px) {
  .card {
    width: 100%;
    height: auto;
    padding: 30px 30px 40px 30px;
  }
  .card__rank {
    position: relative;
    top: -9px;
    left: 0;
    display: inline-block;
  }
  .card__title {
    margin-left: 20px;
    margin-top: 5px;
  }
  .card__voting {
    position: relative;
    position: relative;
    display: block;
    bottom: 0;
    left: 0;
    margin-top: 30px;
  }
  .card__image {
    width: 800px;
    top: auto;
    right: -270px;
    bottom: -70px;
  }
  .card__image img {
    width: 100%;
  }
  .card__image:after {
    width: 190px;
    height: 190px;
    transform-origin: 50px 327px;
    border-radius: 28% 36% 0 0;
  }
  .card__details {
    position: relative;
    right: 0;
    bottom: 0;
    left: 5px;
    margin-top: 20px;
  }
  .card__shareStar {
    position: relative;
    top: 0;
    right: 0;
    margin-top: 50px;
  }
}
@media (max-width: 500px) {
  .card__image {
    width: 700px;
    right: -240px;
  }
  .card__image:after {
    width: 160px;
    height: 160px;
    transform-origin: 42px 290px;
    border-radius: 25% 32% 0 0;
  }
}
@media (max-width: 400px) {
  .card__image {
    width: 540px;
    right: -180px;
    bottom: -40px;
  }
  .card__image:after {
    width: 130px;
    height: 130px;
    transform-origin: 34px 220px;
    border-radius: 29% 34% 0 0;
  }
}
@media (max-width: 320px) {
  .card {
    width: 320px;
  }
}
    </style>
  </head>
<body>
<?xml version="1.0" encoding="utf-8" standalone="no"?>
<div class="wrapper">
	<div class="card">
		<div class="card__date">
			08 Dec. 2023
		</div>
		<div class="card__rank">
			3
		</div>
		<div class="card__title">
      В работе
		</div>
		<ul class="card__voting">
			<li>
				<div class="card__votingIcon">
					<svg height="30px" version="1.1" viewbox="0 0 29 30" width="29px" xmlns="http://www.w3.org/2000/svg">
						<g fill="none" fill-rule="evenodd" sketch:type="MSPage" stroke="none" stroke-width="1">
							<g sketch:type="MSArtboardGroup" transform="translate(-27.000000, -176.000000)">
								<g sketch:type="MSLayerGroup" transform="translate(-49.000000, 37.126849)">
									<g sketch:type="MSShapeGroup" transform="translate(76.000000, 139.093255)">
										<g transform="translate(0.000000, 0.457031)">
											<g>
												<circle cx="14.5" cy="14.5" id="Oval-1" r="13.8607904" stroke="#FFFFFF"></circle>
												<path d="M10.4,10.3 L15,14.9 L19.6,10.3 L21,11.7 L15,17.7 L9,11.7 L10.4,10.3 L10.4,10.3 Z" fill="#FFFFFF" id="Shape" transform="translate(15.000000, 14.000000) rotate(-180.000000) translate(-15.000000, -14.000000)">
												</path>
											</g>
										</g>
									</g>
								</g>
							</g>
						</g>
					</svg>
				</div>
				<div class="card__votingCount">
					2.326
				</div>
			</li>
			<li>
				<div class="card__votingIcon">
					<svg height="30px" version="1.1" viewbox="0 0 29 30" width="29px" xmlns="http://www.w3.org/2000/svg">
						<g fill="none" fill-rule="evenodd" sketch:type="MSPage" stroke="none" stroke-width="1">
							<g sketch:type="MSArtboardGroup" transform="translate(-121.000000, -176.000000)">
								<g sketch:type="MSLayerGroup" transform="translate(-49.000000, 37.126849)">
									<g sketch:type="MSShapeGroup" transform="translate(76.000000, 139.093255)">
										<g transform="translate(94.000000, 0.457031)">
											<g id="down">
												<path d="M9.9,11.3 L14.5,15.9 L19.1,11.3 L20.5,12.7 L14.5,18.7 L8.5,12.7 L9.9,11.3 L9.9,11.3 Z" fill="#63618D" id="Shape">
												</path>
												<circle cx="14.5" cy="14.5" id="Oval-1" r="13.8607904" stroke="#FFFFFF"></circle>
											</g>
										</g>
									</g>
								</g>
							</g>
						</g>
					</svg>
				</div>
				<div class="card__votingCount">
					54
				</div>
			</li>
		</ul>
		<ul class="card__shareStar">
			<li>
				<a href="#favorite"><svg height="20px" version="1.1" viewbox="0 0 22 20" width="22px" xmlns="http://www.w3.org/2000/svg">
						<g fill="none" fill-rule="evenodd" id="Welcome" sketch:type="MSPage" stroke="none" stroke-width="1">
							<g sketch:type="MSArtboardGroup" stroke="#FFFFFF" stroke-width="1.5" transform="translate(-27.000000, -251.000000)">
								<g id="Group" sketch:type="MSLayerGroup" transform="translate(-49.000000, 37.126849)">
									<g id="star" sketch:type="MSShapeGroup" transform="translate(77.000000, 215.000000)">
										<polygon points="10.3671875 14.6835937 4.86129283 17.5782139 5.91282514 11.4473101 1.45846279 7.10537987 7.61424017 6.21089306 10.3671875 0.6328125 13.1201348 6.21089306 19.2759122 7.10537987 14.8215499 11.4473101 15.8730822 17.5782139">
										</polygon>
									</g>
								</g>
							</g>
						</g>
					</svg></a>
			</li>
			<li>
				<a href="#share"><svg height="18px" version="1.1" viewbox="0 0 17 18" width="17px" xmlns="http://www.w3.org/2000/svg">
						<g fill="none" fill-rule="evenodd" sketch:type="MSPage" stroke="none" stroke-width="1">
							<g fill="#FFFFFF" sketch:type="MSArtboardGroup" transform="translate(-71.000000, -253.000000)">
								<g id="Group" sketch:type="MSLayerGroup" transform="translate(-49.000000, 37.126849)">
									<g id="share" sketch:type="MSShapeGroup" transform="translate(77.000000, 215.000000)">
										<path d="M56.7027373,7.3239881 C55.9905985,7.3239881 55.367477,7.59104016 54.9223903,8.03612692 L48.6021583,4.38641548 C48.6911756,4.20838077 48.6911756,3.94132871 48.6911756,3.76329401 C48.6911756,2.24999902 47.53395,1.09277344 46.020655,1.09277344 C44.50736,1.09277344 43.3501345,2.24999902 43.3501345,3.76329401 C43.3501345,5.276589 44.50736,6.43381458 46.020655,6.43381458 C46.7327939,6.43381458 47.3559153,6.16676252 47.8010021,5.72167576 L54.1212341,9.37138721 C54.0322167,9.54942191 54.0322167,9.81647397 54.0322167,9.99450868 C54.0322167,10.1725434 54.0322167,10.4395954 54.1212341,10.6176301 L47.8010021,14.3563589 C47.3559153,13.9112722 46.7327939,13.6442201 46.020655,13.6442201 C44.5963774,13.6442201 43.4391518,14.8014457 43.4391518,16.2257233 C43.4391518,17.650001 44.5963774,18.8072266 46.020655,18.8072266 C47.4449327,18.8072266 48.6021583,17.650001 48.6021583,16.2257233 C48.6021583,16.0476886 48.6021583,15.8696539 48.5131409,15.6026019 L54.8333729,11.8638731 C55.2784597,12.3089598 55.9015811,12.5760119 56.61372,12.5760119 C58.127015,12.5760119 59.2842405,11.4187863 59.2842405,9.90549132 C59.2842405,8.39219633 58.2160323,7.3239881 56.7027373,7.3239881 L56.7027373,7.3239881 L56.7027373,7.3239881 Z">
										</path>
									</g>
								</g>
							</g>
						</g>
					</svg></a>
			</li>
		</ul>
		<div class="card__details">
			<a href="#">details</a>
		</div>
		<div class="card__image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/279756/lamp.png"></div>
	</div>
</div>

<script src="{{ 'assets/vendors/js/vendor.bundle.base.js' }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ 'assets/vendors/chart.js/Chart.min.js' }}"></script>
  <script src="{{ 'assets/vendors/datatables.net/jquery.dataTables.js' }}"></script>
  <script src="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js' }}"></script>
  <script src="{{ 'assets/js/dataTables.select.min.js' }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ 'assets/js/off-canvas.js' }}"></script>
  <script src="{{ 'assets/js/hoverable-collapse.js' }}"></script>
  <script src="{{ 'assets/js/template.js' }}"></script>
  <script src="{{ 'assets/js/settings.js' }}"></script>
  <script src="{{ 'assets/js/todolist.js' }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ 'assets/js/dashboard.js' }}"></script>
  <script src="{{ 'assets/js/Chart.roundedBarCharts.js' }}"></script>
  <!-- End custom js for this page-->
  </body>

</html>

