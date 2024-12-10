<?php
    session_start();
    // include ('database/Config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock 'n' Roll Lessons - E-commerce Music Website</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/lesson.css">
    <?php
    include "../headerfooter/header.php"; 
    
    ?>

</head>
<body>

<div class="container mt-5">
    <h1  id="Title" >Rock 'n' Roll Lessons</h1>
    <div class="row">
        <!-- Lesson 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img1.jpg" class="card-img-top" alt="Lesson 1">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Basics</h2>
                    <p class="card-text">Learn the basics of Rock 'n' Roll guitar techniques and rhythms.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson1')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img2.jpg" class="card-img-top" alt="Lesson 2">
                <div class="card-body">
                    <h2 class="card-title">Intermediate Rock 'n' Roll</h2>
                    <p class="card-text">Take your skills to the next level with intermediate techniques.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson2')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img3.jpg" class="card-img-top" alt="Lesson 3">
                <div class="card-body">
                    <h2 class="card-title">Advanced Rock 'n' Roll</h2>
                    <p class="card-text">Master advanced Rock 'n' Roll techniques and styles.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson3')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 4 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img4.jpg" class="card-img-top" alt="Lesson 4">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Solos</h2>
                    <p class="card-text">Learn to play iconic Rock 'n' Roll solos with precision and style.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson4')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 5 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img5.jpg" class="card-img-top" alt="Lesson 5">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Rhythm Guitar</h2>
                    <p class="card-text">Master the art of rhythm guitar in the Rock 'n' Roll genre.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson5')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 6 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img6.jpg" class="card-img-top" alt="Lesson 6">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Chord Progressions</h2>
                    <p class="card-text">Learn classic Rock 'n' Roll chord progressions and how to use them.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson6')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 7 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img7.jpg" class="card-img-top" alt="Lesson 7">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Lead Guitar</h2>
                    <p class="card-text">Explore lead guitar techniques and improvisation in Rock 'n' Roll.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson7')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 8 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img8.jpg" class="card-img-top" alt="Lesson 8">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Songwriting</h2>
                    <p class="card-text">Learn to write Rock 'n' Roll songs with catchy melodies and lyrics.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson8')">View Lesson</button>
                </div>
            </div>
        </div>
        <!-- Lesson 9 -->
        <div class="col-lg-4 col-md-6">
            <div class="card lesson-card">
                <img src="../images/img9.jpg" class="card-img-top" alt="Lesson 9">
                <div class="card-body">
                    <h2 class="card-title">Rock 'n' Roll Bass Guitar</h2>
                    <p class="card-text">Master bass guitar techniques and grooves in the Rock 'n' Roll style.</p>
                    <button type="button" class="btn btn-dark" onclick="openModal('lesson9')">View Lesson</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals for Lessons -->
<div id="lesson1Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod1.jpg" alt="Lesson 1">
        <h2>Rock 'n' Roll Basics</h2>
        <p>Learn the basics of Rock 'n' Roll guitar techniques and rhythms. This lesson covers essential chord progressions, strumming patterns, and beginner tips.</p>
        <button class="modal-close" onclick="closeModal('lesson1')">Close</button>
    </div>
</div>

<div id="lesson2Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod2.jpg" alt="Lesson 2">
        <h2>Intermediate Rock 'n' Roll</h2>
        <p>Take your skills to the next level with intermediate techniques. This lesson includes more complex chord progressions, lead guitar techniques, and improvisation tips.</p>
        <button class="modal-close" onclick="closeModal('lesson2')">Close</button>
    </div>
</div>

<div id="lesson3Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod3.jpg" alt="Lesson 3">
        <h2>Advanced Rock 'n' Roll</h2>
        <p>Master advanced Rock 'n' Roll techniques and styles. Learn about advanced soloing techniques, fingerstyle playing, and complex rhythms.</p>
        <button class="modal-close" onclick="closeModal('lesson3')">Close</button>
    </div>
</div>

<div id="lesson4Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod4.jpg" alt="Lesson 4">
        <h2>Rock 'n' Roll Solos</h2>
        <p>Learn to play iconic Rock 'n' Roll solos with precision and style. This lesson covers famous solos, techniques for speed and accuracy, and tips for adding your own flair.</p>
        <button class="modal-close" onclick="closeModal('lesson4')">Close</button>
    </div>
</div>

<div id="lesson5Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod5.jpg" alt="Lesson 5">
        <h2>Rock 'n' Roll Rhythm Guitar</h2>
        <p>Master the art of rhythm guitar in the Rock 'n' Roll genre. This lesson focuses on strumming patterns, muting techniques, and timing to keep the groove strong.</p>
        <button class="modal-close" onclick="closeModal('lesson5')">Close</button>
    </div>
</div>

<div id="lesson6Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod6.jpg" alt="Lesson 6">
        <h2>Rock 'n' Roll Chord Progressions</h2>
        <p>Learn classic Rock 'n' Roll chord progressions and how to use them. This lesson covers common progressions, variations, and tips for creating your own.</p>
        <button class="modal-close" onclick="closeModal('lesson6')">Close</button>
    </div>
</div>

<div id="lesson7Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod7.jpg" alt="Lesson 7">
        <h2>Rock 'n' Roll Lead Guitar</h2>
        <p>Explore lead guitar techniques and improvisation in Rock 'n' Roll. This lesson covers scales, bends, slides, and creating melodic phrases.</p>
        <button class="modal-close" onclick="closeModal('lesson7')">Close</button>
    </div>
</div>

<div id="lesson8Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod8.jpg" alt="Lesson 8">
        <h2>Rock 'n' Roll Songwriting</h2>
        <p>Learn to write Rock 'n' Roll songs with catchy melodies and lyrics. This lesson covers song structure, lyric writing, and creating memorable hooks.</p>
        <button class="modal-close" onclick="closeModal('lesson8')">Close</button>
    </div>
</div>

<div id="lesson9Modal" class="modal">
    <div class="modal-content">
        <img src="../images/mod9.jpg" alt="Lesson 9">
        <h2>Rock 'n' Roll Bass Guitar</h2>
        <p>Master bass guitar techniques and grooves in the Rock 'n' Roll style. This lesson includes fingerstyle, slap bass, and creating bass lines that complement the rhythm.</p>
        <button class="modal-close" onclick="closeModal('lesson9')">Close</button>
    </div>
</div>

<script>
    
    function openModal(modalId) {
        var modal = document.getElementById(modalId + 'Modal');
        modal.style.display = 'block';
    }

   
    function closeModal(modalId) {
        var modal = document.getElementById(modalId + 'Modal');
        modal.style.display = 'none';
    }

    
    window.onclick = function(event) {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            if (event.target == modals[i]) {
                modals[i].style.display = "none";
            }
        }
    }
</script>
<?php include '../headerfooter/footer.php'; ?>
</body>
</html>
