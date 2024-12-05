<?php require 'lang.php';?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="header_style.css">
</head>

<body>
<header>
    <div class="logo"> 
        <a href="#">Urban Nest</a>
    </div>
</header>

    <div class="navbar">
        <a class="active" href="index.php">Our nests</a>
        <a href="schedule.php">Schedule</a>
        <a href="agents.php">Our team</a>
        <a href="owners.php">Owners contact list</a>
        <a href="clients_budget_match.php">Customers - Budget match </a>
        <div class="dropdown">
            <a href="#"><?= __('Language')?></a>
			<div class="dropdown-content hide">
                <div><a href="index.php?lang=en">English</a></div>
				<div><a href="index.php?lang=fr">Français</a></div>
            </div>
        </div>
	</div>

</body>

<script>
	
	var dropdowns = document.querySelectorAll(".dropdown");

	for (var i = 0; i < dropdowns.length; i++) {
		
		dropdowns[i].addEventListener('click',function(event){

			for (var j = 0; j < dropdowns.length; j++) {
				dropdowns[j].querySelector(".dropdown-content").classList.add("hide");
			}

			event.currentTarget.querySelector(".dropdown-content").classList.toggle("hide");
		});
	}

</script>
</html>
