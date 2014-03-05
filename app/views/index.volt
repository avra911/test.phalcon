<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
	</head>
	<body>
        <div class="container flash-output">
            {% block content %}
            {{ flash.output() }}
            {% endblock %}
        </div>
		{{ content() }}
	</body>
</html>