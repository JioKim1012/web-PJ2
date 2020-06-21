<?php
$search = $_POST['search'];
if($search == "title"){
    $title = $_POST['by_title'];
    header('location:../page/searcher.php?title='.$title);
}else if($search == "description"){
    $content = $_POST['by_content'];
    header('location:../page/searcher.php?content='.$content);
}
?>