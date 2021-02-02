<?php

require_once './templates/header.php';
global $db;
if (empty($_SESSION['user_info'])) header('Location: ./login.php');
// getting notes from db if user is selected and existed
$notes = $db->getNotes();
?>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <form method="post">
                <fieldset>
                    <legend>New Post</legend>
                    <input type="text" class="form-control mb-3" placeholder="post name" name="note_header">
                    <textarea class="form-control mb-3" placeholder="post body" name="note_body"></textarea>
                    <button class="btn btn-primary" name="create_note">Add new note</button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row align-items-stretch">
        <div class="col-12">
            <h2 class="text-center">BLOG</h2>
        </div>
        <?php foreach ($notes as $note): ?>
        <div class="col-12 mb-4 h-100">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title"><?=$note['header']?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?='#'.$note['id']?></h6>
                            </div>
                            <div class="text-muted">
                                <?=$note['userName']?>
                            </div>
                        </div>

                        <p class="card-text"><?=substr($note['body'], 0, 800).'...'?></p>
                    </div>
                </div>
        </div>
        <?php endforeach ?>
    </div>

</div>
<?php
require_once './templates/footer.php';
