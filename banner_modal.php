<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Delivery Modal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       .modal-content {
  background-color: antiquewhite; /* Light background */
  border-radius: 8px; /* Rounded corners */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */

  border: none;

  font-size: 20px;
}

.modal-body {
  display: flex;
  align-items: center;
  margin: auto;
  
}

.modal-body img {
  width: 100px; /* Icon size */
  height: auto;
}

  .modal-header, .modal-footer {
            border: none; /* Remove border */
        }
        .delivery-image {
            width: 100%; /* Full width for the image */
            height: auto; /* Maintain aspect ratio */
            max-height: 150px; /* Limit height */
            object-fit: cover; /* Cover the space without stretching */
            margin-bottom: 1rem; /* Space below the image */
        }

    </style>
</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-aos="fade-down" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Delivery Information</h5> -->
                    <button type="button" class="btn-close" style="outline:none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./assets/discount-images/delivery.png" class="delivery-image"  >
                    
                    <p>Frozen Foods Order More Than <strong>¥9500</strong> Or Dry Foods Order More Than <strong>¥8000</strong> Get Free Delivery !</p>
                </div>
                <div class="modal-footer">
                    <a href="./shop.php" type="button" class="btn btn-warning">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init();

        // Show the modal on page load after a 2-second delay
        $(document).ready(function() {
            setTimeout(function() {
                $('#myModal').modal('show');
            }, 2000); // 2000 milliseconds = 2 seconds
        });
    </script>
</body>
</html>

