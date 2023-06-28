<?php require "partials/top.php"; ?>

<?php require "partials/navbar.php"; ?>

<div class="jumbotron text-center">
    <h4><?php echo $_SESSION['loggedUser'] -> name ?></h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <?php foreach ($userPosts as $userPost): ?>
                
                <div class="col-6">
                    <div class="card mb-5">
                        <div class="card-header bg-info"><?php echo $userPost->title; ?>
                        <?php if(isset($_SESSION['loggedUser']) && ($userPost->user_id == $_SESSION['loggedUser']->id)): ?>
                            <span><a href="delete_post.php?id=<?php echo $userPost->id; ?>" class="btn btn-sm btn-danger float-right">Видалити</a></span>
                        <?php endif ?>
                        
                    </div>
                        <div class="card-body"><?php echo $userPost -> description; ?></div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm float-left"><?php echo $userPost -> created_at; ?></button>
                        
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                
            </div>
        </div>
    </div>
</div>


<?php require "partials/bottom.php"; ?>