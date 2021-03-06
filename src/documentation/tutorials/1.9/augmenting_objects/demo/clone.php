<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Demo: lang.clone
		</title>
		<link rel="stylesheet" href="style.css" media="screen" type="text/css">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen" type="text/css">
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript("async: true");
		?>
		<script>

			require(["dojo/_base/lang"], function(lang){
				function mixinDemo(){
					var a = {
						name: "a",
						subObject: {
							foo: "bar"
						}
					};
					var b = lang.mixin({}, a);

					b.name = "b";
					b.subObject.foo = "baz";

					console.info('lang.mixin demo:');
					console.log("a b, as expected:\n\t",
						a.name, b.name);
					console.log("true - both subObjects reference the exact same object:\n\t",
						a.subObject === b.subObject);
					console.log("baz baz - a change to one subObject affects both:\n\t",
						a.subObject.foo, b.subObject.foo);
				}

				function cloneDemo(){
					var a = {
						name: "a",
						subObject: {
							foo: "bar"
						}
					};
					var b = lang.clone(a);

					b.name = "b";
					b.subObject.foo = "baz";

					console.info('lang.clone demo:');
					console.log("a b, same as before:\n\t",
						a.name, b.name);
					console.log("false - the subObjects are different now:\n\t",
						a.subObject === b.subObject);
					console.log("bar baz - a change to one subObject no longer affects them all:\n\t",
						a.subObject.foo, b.subObject.foo);
				}

				mixinDemo();
				cloneDemo();
			});
		</script>
	</head>
	<body>
		<h1>Demo: lang.clone</h1>
		<p>View source. The result is in the console.</p>
	</body>
</html>
