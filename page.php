
<?php
    
    include_once 'backend/function.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
    <style> 
        .span{
            color: #808080;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header class="bg-light p-4">
        <div class="container">
            <div class="row">
                <p class="col-10">
                    <a class="p-2 bg-warning rounded" href="/exit.php">ВЫЙТИ</a>
                </p>
                <p class="col-2 p-2 bg-warning rounded">
                    USER: <?=$_COOKIE['user']?>
                </p>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <main class="container">
                <div class="justify-content-center mb-4">
                    <form action="backend/addmesseg.php" method="POST" class="row" >
                        <h2>Добавить сообщение</h2>
                        <div class="mb-3 col-6 mt-3">
                            <label for="message" class="form-label">Ваше сообщение</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="helow,my frends"></textarea>
                        </div>
                        <div class="col-6">
                            <div class="mb-3  mt-3">
                                <label for="hashtag" class="form-label">Hashtag</label>
                                <input type="search" id="hashtag" name="hashtag" list="list" placeholder="#" class="form-control" autocomplete="off">
                                <datalist id="list">
                                    <?php 
                                        $hashtag = getHashtag();
                                        for ($i = 0; $i < count($hashtag); $i++) {
                                        echo '<option value="'. $hashtag[$i] . '">';
                                        }
                                    ?>
                                </datalist>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="field" class="form-label">Область знаний</label>
                                <select name="field" id="field" class="form-select">
                                    <?php
                                        $fields = getFields();
                                        for ($i = 0; $i < count($fields); $i++) {
                                        echo '<option value="' . $fields[$i] . '">' . $fields[$i] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-2">Добавить</button>
                    </form>
                </div>
                <div class="container row">
                    <h2 class="mb-3">Сообщения</h2>
                    <div class="row ">
                        <?php
                            $mysql = new mysqli('std-mysql', 'std_1739_cworkphp', 'Bigbos2002', 'std_1739_cworkphp');
                            $result = mysqli_query($mysql, "SELECT * FROM `sms`");
                            $result = mysqli_fetch_all($result);
                            foreach($result as $item) {
                                $title = sql_query('SELECT name FROM `field` WHERE `id` =' . $item[2])->fetch_assoc()['name'];
                                $subtitle = sql_query('SELECT name FROM `hashtag` WHERE `id` =' . $item[1])->fetch_assoc()['name'];
                                ?>
                                <div class="card-body border col-3 m-3 rounded p-3" > 
                                    <h5 class="card-title mb-3">sms</h5>
                                    <p class="card-text"><span class="span">hashtag:</span> #<?php echo $subtitle ?></p>
                                    <p class="card-text"><span class="span">field:</span> <?php echo $title?></p>
                                    <p class="card-text"><?php echo $item[3] ?></p>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </main>
</body>
</html>