<?php

namespace Drupal\d8cards_migrate\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for genre term.
 *
 * @MigrateSource(
 *   id = "genres"
 * )
 */
class Genres extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('movies_genres', 'g')
      ->fields('g', ['id', 'movie_id', 'name']);
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Genre ID'),
      'movie_id' => $this->t('Movie ID'),
      'name' => $this->t('Movie name'),
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
        'alias' => 'g',
      ],
    ];
  }

}
