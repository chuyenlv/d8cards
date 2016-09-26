<?php

namespace Drupal\d8cards_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for movie content.
 *
 * @MigrateSource(
 *   id = "movies"
 * )
 */
class Movies extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return = $this->select('movies', 'm')
      ->fields('m', ['id', 'name', 'description']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Movie ID'),
      'name' => $this->t('Movie name'),
      'description' => $this->t('Full description of the movie'),
      'genres' => $this->t('Movie genres'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'm',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $genres = $this->select('movies_genres', 'g')
      ->fields('g', ['id'])
      ->condition('movie_id', $row->getSourceProperty('id'))
      ->execute()
      ->fetchCol();
    $row->setSourceProperty('genres', $genres);
    return parent::prepareRow($row);
  }

}
