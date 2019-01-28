
<?php
/*
 * PHP code to traverse hierarchical data (adjacency list model)
 * https://salman-w.blogspot.com/2012/08/php-adjacency-list-hierarchy-tree-traversal.html
 */

$link = mysqli_connect("localhost", "root", "andersom11", "netrix");


$data = array();
$index = array();

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$result  = mysqli_query($link,"SELECT id, pai, nome from tab_usuario order by nome");

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $pai = $row["pai"] === NULL ? "NULL" : $row["pai"];
    $data[$id] = $row;
    $index[$pai][] = $id;
}


function display_child_nodes($parent_id, $level)
{
    global $data, $index;
    $parent_id = $parent_id === NULL ? "NULL" : $parent_id;
    if (isset($index[$parent_id])) {
        foreach ($index[$parent_id] as $id) {
            echo str_repeat("-", $level) . $data[$id]["nome"] . "\r\n<br>";
            display_child_nodes($id, $level + 1);
        }
    }
}
display_child_nodes(0, 0);


?>

