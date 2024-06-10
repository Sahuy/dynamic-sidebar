<?php
include('config.php');
?>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

<?php
    $query = "SELECT * FROM assdt_sidebar WHERE parent_id = 0";
    $query_run = mysqli_query($mysqli, $query);

    $parent_ids_arr = array();
    $query_parent = "SELECT parent_id FROM assdt_sidebar WHERE parent_id != 0 GROUP BY parent_id;";
    $query_run_parent = mysqli_query($mysqli, $query_parent);
    foreach ($query_run_parent as $sidebar_parent) {
        $parent_ids_arr[] = $sidebar_parent['parent_id'];
    }

    //print_r($parent_ids_arr);
    
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $sidebar) {

            if( !in_array($sidebar['sidebar_id'], $parent_ids_arr)){
    ?>

                 <li>
                 <a class="active" href="<?php echo $sidebar['active_link_name']; ?>">
                    <i class="<?php echo $sidebar['tab_icon_class']; ?>"></i>
                        <span><?php echo $sidebar['tab_name']; ?></span>
                </a>
              </li>
                
                <?php
            }else{
    
    ?>
                <li class="sub-menu">
                    <a href="<?php echo $sidebar['active_link_name']; ?>">
                        <i class="<?php echo $sidebar['tab_icon_class']; ?>"></i>
                        <span><?php echo $sidebar['tab_name']; ?></span>
                    </a>
                    <ul class="sub">
                        <?php 
                        // 6echo "hii".$sidebar['sidebar_id'];
                         $query_chidl = "SELECT * FROM assdt_sidebar WHERE parent_id = ".$sidebar['sidebar_id']." ";
                         $query_run_child = mysqli_query($mysqli, $query_chidl);

                        if (mysqli_num_rows($query_run_child) > 0) {
                           foreach ($query_run_child as $sidebar_child) {
                        ?>
                          <li><a href="<?php echo $sidebar_child['active_link_name']; ?>"><?php echo $sidebar_child['tab_name']; ?></a></li> 
                     <?php }} ?>
                    </ul>
                </li>

     <?php 
            }
           }
         }

        
         
?>  
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->