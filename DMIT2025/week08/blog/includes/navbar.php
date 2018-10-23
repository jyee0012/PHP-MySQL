<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--  We'll use the BASE_URL set in the connection script to resolve all links -->
            <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php">Blog - <?php echo "$title"; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- This page doesn't exist. It's just a sample link. YOU need to change it! -->
                <!-- <li><a href="<?php echo BASE_URL ?>index.php">Contact List</a></li> -->
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>admin/insert.php">Insert</a></li>
                        <li><a href="<?php echo BASE_URL ?>admin/edit.php">Edit</a></li>
                    </ul>
                </li>
            </ul>

            <div class="form-group col-md-6">
                <form name="myform" style="padding-top: 1rem" class="formstyle" method="post" action="<?php echo BASE_URL ?>search.php">
                    <div class="input-group">
                        <input type="text" class="form-control searchsubmit-text" id="searchterm" name="searchterm" value="">
                        <?php if ($searchValidate){echo "<div class=\"alert alert-warning\">" .$searchValidate. "</div>"; } ?>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary searchsubmit" name="searchsubmit">Search <i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo BASE_URL ?>admin/<?php echo $loginText; ?>.php"><?php echo ucwords($loginText); ?></a></li>
            </ul>
        </div><!--/.nav-collapse -->

        <script>
            document.querySelector(".searchsubmit").addEventListener('submit', (evt) => {
                if (trim(document.querySelector(".searchsubmit-text").innerHTML) == "") {
                    evt.preventDefault();
                    alert("Please enter something to search.");
                }
            });
        </script>

    </div><!--/.container-fluid -->
</nav>