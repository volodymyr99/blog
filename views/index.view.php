<?php require "partials/top.php"; ?>

<?php require "partials/navbar.php"; ?>

<div class="jumbotron text-center">
    <h4>Статті</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <?php foreach ($posts as $single): ?>

                
                
                <div class="col-6">
    
                    <div class="card mb-5">
                        <div class="card-header bg-info"><?php echo $single->title; ?>
                        <?php if(isset($_SESSION['loggedUser']) && ($single->user_id == $_SESSION['loggedUser']->id)): ?>
                            <span><a href="delete_post.php?id=<?php echo $single->id; ?>" class="btn btn-sm btn-danger float-right">Видалити</a></span>
                        <?php endif ?>
                        
                    </div>
                        <div class="card-body">
                        <?php echo mb_substr($single->description, 0, 200)."..."; ?><br>
                        <a href="single.php?id=<?php echo $single->id ?>" class="btn btn-sm btn-info mt-4">Переглянути</a>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm float-left mr-2"><?php echo $post -> getUser($single->user_id); ?></button>
                            <button class="btn btn-primary btn-sm float-left"><?php echo $single -> created_at; ?></button>
                        
                        </div>
                    </div>
    
                </div>
                <?php endforeach ?>
                
            </div>
        </div>
    </div>
</div>


<?php require "partials/bottom.php"; ?>
