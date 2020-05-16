<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
<head>
  <meta charset="{{ bloginfo('charset') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#6d9aea">
  @php wp_head() @endphp
</head>
<body @php body_class() @endphp>
    <header>
        <nav role="navigation">
            @php wp_nav_menu(['theme_location' => 'navigation']); @endphp
        </nav>
    </header>
