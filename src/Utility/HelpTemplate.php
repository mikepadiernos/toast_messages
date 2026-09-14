<?php

namespace Drupal\toast_messages\Utility;

/**
 * Implement the getModuleName() member function.
 */
final class HelpTemplate {

  /**
   * Generate a render array with our templated content.
   *
   * @return array
   *   A render array.
   */
  public static function help(): array {
    $template_path = self::getDescriptionTemplatePath();
    $template = file_get_contents($template_path);
    $build = [
      'description' => [
        '#type' => 'inline_template',
        '#template' => $template,
        '#context' => self::getDescriptionVariables(),
      ],
    ];
    return $build;
  }

  /**
   * Name of module.
   *
   * @return string
   *   A module name.
   */
  public static function getModuleName(): string {
    return 'toast_messages';
  }

  /**
   * Variables to act as context to the twig template file.
   *
   * @return array
   *   Associative array that defines context for a template.
   */
  public static function getDescriptionVariables(): array {
    $variables = [
      'module' => self::getModuleName(),
    ];
    return $variables;
  }

  /**
   * Get full path to the template.
   *
   * @return string
   *   Path string.
   */
  public static function getDescriptionTemplatePath(): string {
    return \Drupal::service('extension.list.module')->getPath(self::getModuleName()) . "/templates/help.html.twig";
  }

}
