
<?php
session_start();
include "user/headerfooter/header.php"; 
?>

<!-- About Music Section -->
<section class="about-music bg-light mt-5 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Discover the Power of Music</h2>
                <p class="lead">Music is a universal language that transcends boundaries, cultures, and generations. It has the power to evoke emotions, inspire creativity, and bring people together.</p>
                <p>Whether you're a seasoned musician or just starting your musical journey, G-Clef Music Store offers a wide range of instruments, accessories, and resources to fuel your passion for music.</p>
            </div>
        </div>
    </div>
</section>

<!-- Famous Rock and Roll Bands Section -->
<section class="famous-bands mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Famous Rock and Roll Bands</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img1.png" class="card-img-top img-fluid" alt="The Beatles">
                    <div class="card-body">
                        <h5 class="card-title">The Beatles</h5>
                        <p class="card-text">Legendary British rock band that revolutionized popular music in the 1960s.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img5.png" class="card-img-top img-fluid" alt="Led Zeppelin">
                    <div class="card-body">
                        <h5 class="card-title">Led Zeppelin</h5>
                        <p class="card-text">Iconic band known for their heavy sound and epic performances.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img4.png" class="card-img-top img-fluid" alt="The Rolling Stones">
                    <div class="card-body">
                        <h5 class="card-title">The Rolling Stones</h5>
                        <p class="card-text">Rock pioneers with a career spanning over five decades and countless hits.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img6.png" class="card-img-top img-fluid" alt="Guns N' Roses">
                    <div class="card-body">
                        <h5 class="card-title">Guns N' Roses</h5>
                        <p class="card-text">A hard rock band that shook the music world in the late 1980s with their raw energy and rebellious spirit.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img3.png" class="card-img-top img-fluid" alt="Pink Floyd">
                    <div class="card-body">
                        <h5 class="card-title">Pink Floyd</h5>
                        <p class="card-text">Known for their psychedelic sound and profound lyrics, Pink Floyd redefined the music scene in the 1970s.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="user/discimages/img2.png" class="card-img-top img-fluid" alt="Queen">
                    <div class="card-body">
                        <h5 class="card-title">Queen</h5>
                        <p class="card-text">Famous for their theatrical performances and iconic anthems, Queen remains a monumental influence in rock history.</p>
                        <a href="user/lessons/lesson.php" class="btn btn-outline-dark">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="call-to-action py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Start Your Musical Journey Today</h2>
                <p class="lead">Explore our store and find the perfect instruments to create your own musical legacy.</p>
                <a class="btn btn-dark btn-lg" href="lesson.php" role="button">Get Started</a>
            </div>
        </div>
    </div>
</section>

<?php
include 'user/headerfooter/footer.php'; 
?>
