
<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('images/tufted-titmouse.jpg') ?>">
      <h2>Birds</h2>
      <p>Information extracted from .csv table.</p>
      <p>For OOP practice.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation Id</th>
        <th>Backyard Tips</th>
      </tr>

   <?php

  $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
  $bird_array = $parser->parse();

  // print_r($bird_array);

  // $args = [
  //   'common_name' => 'Carolina Wren', 
  //   'Habitat' => 'Open Woodlands', 
  //   'Food' => 'Insects',
  //   'Nest Placement' => 'Cavity',
  //   'Behavior' => 'Ground Forager',
  //   'Conservation Id' => 1,
  //   'Backyard Tips' => 'Carolina Wren visits suet-filled feeders during winter'
  //   ];
    // creating a new instance of bird
    $bird = new Bird($args);
?>

<!-- // need a foreach, create an array called bird array -->
<!-- // conservation_id echo $bird->conservation() -->
     <?php foreach($bird_array as $args) { ?>
      <?php $bird = new Bird($args); ?>
      <tr>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->nest_placement); ?></td>
        <td><?php echo h($bird->behavior); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><?php echo h($bird->backyard_tips); ?></td>
      </tr>
     <?php } ?>

    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
