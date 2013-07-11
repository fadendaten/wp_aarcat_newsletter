# Aarcat Newsletter Plugin for WordPress

Manages the newsletter sub- and unsubscription by the aarcat newsletter service.

## Installation

1. Download the php file.
2. Change the url path.
3. Copy the file to your server (../wp-content/plugins/aarcat_newsletter/)
4. Activate the Plugin in your WordPress backend


## Usage

1. Include the [newsletter] [/newsletter] tag in your post.
2. The code between the newsletter tag would be commited.
3. For the subscription the name of the submit input field have to be 'subscribe'. And for the unsubscription use 'unsubscribe'.
4. Make sure you post at least a email address. 
5. See the Examples

## Examples

### Subscribe

Paste this in your post:

	[newsletter]
		<label for="name">Vorname</label><input id="firstname" type="text" name="firstname" required="true">
		<label for="name">Nachname</label><input id="lastname" type="text" name="lastname" required="true">
		<label for="name">E-Mail</label><input id="email" type="email" name="email" required="true" />
		<input id="submit" type="submit" name="subscribe" value="Anmelden" />
	[/newsletter]


### Unsubscribe

For your unsubscribe post paste this:

	[newsletter]
		<label for="name">E-Mail</label><input id="email" type="email" name="email" required="true" />
		<input id="case" type="hidden" name="case" value="subscribe" />
		<input id="submit" type="submit" name="unsubscribe" value="Abmelden" />
	[/newsletter]

### Questions?

Write an email to f.langenegger@fadendaten.ch
