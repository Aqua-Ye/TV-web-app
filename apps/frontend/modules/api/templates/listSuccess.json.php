<?php

$data = [$model.'s' => array()];
foreach($objects as $object) {
  if ($model === "person") {
    $data[$model.'s'][] = ['id' => $object->getId(), 'fname' => $object->getFname(), 'lname' => $object->getLname()];
  }
}

echo json_encode($data);