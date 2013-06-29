<?php

$data = [$model.'s' => array()];
foreach($objects as $object) {
  if ($model === "person") {
    $data[$model.'s'][] = ['id' => $object->getId(), 'fname' => $object->getFname(), 'lname' => $object->getLname()];
  } else if ($model === "show") {
    $data[$model.'s'][] = [
      'id' => $object->getId(),
      'name' => $object->getName(),
      'creators' => $object->getCreators(),
      'cast' => $object->getCast(),
      'genre_id' => $object->getGenre()->getId(),
      'image' => $object->getImage(),
      'storyline' => $object->getStoryline(),
    ];
  }

}

echo json_encode($data);