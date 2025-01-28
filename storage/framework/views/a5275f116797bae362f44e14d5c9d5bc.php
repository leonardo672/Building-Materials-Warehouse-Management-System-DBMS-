<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse of Building Materials Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Translate Script -->
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'en',  // Default language of your website
          includedLanguages: 'en,es,fr,de,it,pt,ar,ru',  // Languages to offer in the dropdown
          layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
      }
    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <style>
    /* General Page Styling */
    body {
    font-family: 'Roboto', sans-serif;
    background-color: #f1f3f5; /* Softer background color */
    color: #444;
    margin: 0;
    padding: 0;
}

/* Navbar Styling */
.navbar {
    background-color: #343a40;  /* Dark Charcoal */
    padding: 20px 30px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15); /* Softer shadow */
    border-radius: 8px; /* Rounded corners */
    position: relative;
}

/* Navbar Heading Styling */
.navbar h2 {
    color: #fff;
    font-family: 'Times New Roman', serif;
    font-weight: 700; /* Bold text */
    font-size: 20px; /* Optimal font size */
    letter-spacing: 1px;
    margin: 0;
    position: relative;
    text-transform: uppercase;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25); /* Soft shadow for depth */
    transition: all 0.3s ease;
    padding-right: 30px; /* Space for the icon */
}

/* Font Awesome Building Icon below the navbar heading */
.navbar h2::after {
    content: "\f1b2"; /* Unicode for building icon (Font Awesome) */
    font-family: 'Font Awesome 5 Free'; /* Specify Font Awesome */
    font-weight: 900; /* Bold icon */
    font-size: 24px;
    display: block;
    margin-top: 5px;
    text-align: center;
    color: #fff; /* White icon */
    transition: color 0.3s ease;
}

/* Navbar hover effect */
.navbar h2:hover {
    color: #00bcd4; /* Change color on hover */
    letter-spacing: 2px; /* Increase spacing */
}

/* Responsive font sizes */
@media (max-width: 768px) {
    .navbar h2 {
        font-size: 18px;
    }

    .navbar h2::after {
        font-size: 22px; /* Slightly smaller icon */
    }
}

@media (max-width: 480px) {
    .navbar h2 {
        font-size: 16px;
    }

    .navbar h2::after {
        font-size: 20px; /* Further adjustment for mobile */
    }
}

    .navbar .navbar-toggler-icon {
        background-color: #ffffff;
    }

    .navbar .nav-link {
        color: #bbb;
        transition: color 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #ffffff;
        text-decoration: none;
    }

    /* Content Area Styling */
    .content-wrapper {
        padding: 30px;
        margin-top: 20px;
    }

    .col-md-12 {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .col-md-12:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    /* Footer Styling */
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #343a40;  /* Dark Charcoal */
        color: #FFFFFF;
        text-align: center;
        padding: 12px 20px;
        font-size: 14px;
    }

    /* General Styles for Buttons */
    .btn {
        font-size: 14px;
        padding: 10px 20px;
        margin: 8px 5px;
        border-radius: 50px; /* Rounded buttons */
        font-weight: 600;
        cursor: pointer;
        border: 2px solid transparent;
        outline: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        transition: all 0.4s ease-in-out;
    }

    /* Add New Transaction Button */
    .btn-add-user {
        background-color: #709b94; /* Soft Green */
        color: white;
        box-shadow: 0 6px 15px rgba(112, 155, 148, 0.2);
    }

    .btn-add-user:hover {
        background-color: #416a5d;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(65, 106, 93, 0.3);
    }

    /* View Button */
    .btn-view {
        background-color: #080f09; /* Dark Charcoal */
        color: white;
        box-shadow: 0 6px 15px rgba(8, 15, 9, 0.2);
    }

    .btn-view:hover {
        background-color: #2a4a3d;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(42, 74, 61, 0.3);
    }

    /* Edit Button */
    .btn-edit {
        background-color: #416a5d; /* Deep Green */
        color: white;
        box-shadow: 0 6px 15px rgba(65, 106, 93, 0.2);
    }

    .btn-edit:hover {
        background-color: #14301f;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(20, 48, 31, 0.3);
    }

    /* Delete Button */
    .btn-delete {
        background-color: #2a4a3d; /* Deep Green */
        color: white;
        box-shadow: 0 6px 15px rgba(42, 74, 61, 0.2);
    }

    .btn-delete:hover {
        background-color: #14301f;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(20, 48, 31, 0.3);
    }

    /* Responsive Styling for Navbar */
    @media (max-width: 768px) {
        .navbar {
            padding: 10px 15px;
        }

        .content-wrapper {
            padding: 15px;
        }

        .col-md-12 {
            padding: 15px;
        }
    }

    
</style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><h2>Building Materials Warehouse Management System</h2></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Navigation Items -->
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/users')); ?>"><i class="fas fa-users"></i> Users</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/locations')); ?>"><i class="fas fa-user-friends"></i> Locations</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/materials')); ?>"><i class="fas fa-cogs"></i> Materials</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/orders')); ?>"><i class="fas fa-tag"></i> Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/suppliers')); ?>"><i class="fas fa-box"></i> Suppliers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/categories')); ?>"><i class="fas fa-box"></i> Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/transactions')); ?>"><i class="fas fa-shopping-cart"></i> Transactions</a></li>
                <!-- Google Translate -->
                <li class="nav-item">
                    <div id="google_translate_element"></div>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content Area -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <?php echo $__env->yieldContent('content'); ?> <!-- Content Injected Here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Building Materials Warehouse Management System | All Rights Reserved</p>
    </div>

    <!-- Bootstrap JS (for toggling dropdowns and navbar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/layout.blade.php ENDPATH**/ ?>