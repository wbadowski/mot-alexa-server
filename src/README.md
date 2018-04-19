# Alexa Endpoint Library Documentation
## Version 0.1.0

## Table of Contents

### Simple
Classes intended to make everything simple
* [Alexa](#MayBeTall-Alexa-Endpoint-Alexa)
    * [init](#MayBeTall-Alexa-Endpoint-Alexa-init)
    * [remember](#MayBeTall-Alexa-Endpoint-Alexa-remember)
    * [recall](#MayBeTall-Alexa-Endpoint-Alexa-recall)
    * [forget](#MayBeTall-Alexa-Endpoint-Alexa-forget)
    * [say](#MayBeTall-Alexa-Endpoint-Alexa-say)
    * [ask](#MayBeTall-Alexa-Endpoint-Alexa-ask)
    * [enters](#MayBeTall-Alexa-Endpoint-Alexa-enters)
    * [exits](#MayBeTall-Alexa-Endpoint-Alexa-exits)
* [User](#MayBeTall-Alexa-Endpoint-User)
    * [triggered](#MayBeTall-Alexa-Endpoint-User-triggered)
    * [stated](#MayBeTall-Alexa-Endpoint-User-stated)
* [Util](#MayBeTall-Alexa-Endpoint-Util)
    * [compareString](#MayBeTall-Alexa-Endpoint-Util-compareString)
    * [bestMatch](#MayBeTall-Alexa-Endpoint-Util-bestMatch)
### Advanced
If you want more control, look through these classes.
* [Intent](#MayBeTall-Alexa-Endpoint-Intent)
    * [init](#MayBeTall-Alexa-Endpoint-Intent-init)
    * [name](#MayBeTall-Alexa-Endpoint-Intent-name)
    * [slots](#MayBeTall-Alexa-Endpoint-Intent-slots)
    * [hasSlot](#MayBeTall-Alexa-Endpoint-Intent-hasSlot)
    * [getSlot](#MayBeTall-Alexa-Endpoint-Intent-getSlot)
    * [listen](#MayBeTall-Alexa-Endpoint-Intent-listen)
* [Request](#MayBeTall-Alexa-Endpoint-Request)
    * [init](#MayBeTall-Alexa-Endpoint-Request-init)
    * [getPayload](#MayBeTall-Alexa-Endpoint-Request-getPayload)
    * [getAttributes](#MayBeTall-Alexa-Endpoint-Request-getAttributes)
    * [getType](#MayBeTall-Alexa-Endpoint-Request-getType)
* [Response](#MayBeTall-Alexa-Endpoint-Response)
    * [init](#MayBeTall-Alexa-Endpoint-Response-init)
    * [addSessionAttribute](#MayBeTall-Alexa-Endpoint-Response-addSessionAttribute)
    * [addSessionAttributes](#MayBeTall-Alexa-Endpoint-Response-addSessionAttributes)
    * [getSessionAttribute](#MayBeTall-Alexa-Endpoint-Response-getSessionAttribute)
    * [removeSessionAttribute](#MayBeTall-Alexa-Endpoint-Response-removeSessionAttribute)
    * [append](#MayBeTall-Alexa-Endpoint-Response-append)
    * [send](#MayBeTall-Alexa-Endpoint-Response-send)

# Simple
Classes intended to make everything simple

## <a id='MayBeTall-Alexa-Endpoint-Alexa'>Alexa</a>

Initializes the libray and handles the Alexa side of the conversation.



* Full name: \MayBeTall\Alexa\Endpoint\Alexa




### <a id='MayBeTall-Alexa-Endpoint-Alexa-init'>init</a>
Init the application.

```php
Alexa::init()
```



* This method is **static**.





---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-remember'>remember</a>
Have Alexa remember something during the conversation.

```php
Alexa::remember(string $key, mixed $value)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key used to retrieve the value later. |
| `$value` | **mixed** | The value to remember. |



**See Also:**

* \MayBeTall\Alexa\Endpoint\Response::addSessionAttribute 

---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-recall'>recall</a>
Get the things Alexa remembers about this conversation.

```php
Alexa::recall(string $attribute): mixed
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attribute` | **string** | The attribute to get. |


**Return Value:**

The value of the attribute, or null if it didn't exist.


**See Also:**

* \MayBeTall\Alexa\Endpoint\Response::getSessionAttribute 

---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-forget'>forget</a>
Make Alexa forget something from the conversation.

```php
Alexa::forget(string $attribute = null)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attribute` | **string** | The attribute to forget, or pass nothing for her to forget everything. |



**See Also:**

* \MayBeTall\Alexa\Endpoint\Response::removeSessionAttribute 

---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-say'>say</a>
Have Alexa say something.

```php
Alexa::say(string $text, boolean $endSession = true)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$text` | **string** | The text that Alexa should say. Supports SSML. |
| `$endSession` | **boolean** | Defaults to true. If true, ends the skill after speaking. |




---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-ask'>ask</a>
Have Alexa ask something, expecting a reply

```php
Alexa::ask(string $text, string $repromt = "")
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$text` | **string** | The text that Alexa should say. Supports SSML. |
| `$repromt` | **string** | Optional. The text that Alexa should say if the user does not respond. Supports SSML. |




---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-enters'>enters</a>
Runs a function if Alexa skill launched.

```php
Alexa::enters(callable $callback)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$callback` | **callable** | The callback function to run if Alexa just launched |




---

### <a id='MayBeTall-Alexa-Endpoint-Alexa-exits'>exits</a>
Runs a function if Alexa skill exited.

```php
Alexa::exits(callable $callback)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$callback` | **callable** | The callback function to run if Alexa just exited |




---

## <a id='MayBeTall-Alexa-Endpoint-User'>User</a>

Handles the User side of the conversation.



* Full name: \MayBeTall\Alexa\Endpoint\User




### <a id='MayBeTall-Alexa-Endpoint-User-triggered'>triggered</a>
Trigger callback when user triggesr intent.

```php
User::triggered(string $name, callable $callback = null)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** | The name of the intent that fires the callback function. |
| `$callback` | **callable** | The callback function to run when the intent is triggered. |



**See Also:**

* \MayBeTall\Alexa\Endpoint\Intent::listen 

---

### <a id='MayBeTall-Alexa-Endpoint-User-stated'>stated</a>
Returns the slot stated by the user.

```php
User::stated(string $slot): mixed
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slot` | **string** | The slot to look for. |


**Return Value:**

Returns the value of the intent slot, or null if there was no slot value defined.


**See Also:**

* \MayBeTall\Alexa\Endpoint\Intent::getSlot 

---

## <a id='MayBeTall-Alexa-Endpoint-Util'>Util</a>

Provides utility functions.



* Full name: \MayBeTall\Alexa\Endpoint\Util




### <a id='MayBeTall-Alexa-Endpoint-Util-compareString'>compareString</a>
Compares two strings by how similar they sound.

```php
Util::compareString(string $str1, string $str2): float
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$str1` | **string** | The primary string |
| `$str2` | **string** | The secondary string |


**Return Value:**

A value between 0-1, indicating how close the two strings sound.



---

### <a id='MayBeTall-Alexa-Endpoint-Util-bestMatch'>bestMatch</a>
Finds the most similar sounding value to $needle in $haystack.

```php
Util::bestMatch(string $needle, object $haystack, string $prop = null, float $threshold = 0.7): mixed
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$needle` | **string** | The string to compare |
| `$haystack` | **object** | The object to search |
| `$prop` | **string** | The property of the object to compare, if the string value is nested inside the object. |
| `$threshold` | **float** | A value 0-1 defining how close a match must sound be to be considered. |


**Return Value:**

Returns a string, an object, or null.



---

# Advanced
If you want more control, look through these classes.

## <a id='MayBeTall-Alexa-Endpoint-Intent'>Intent</a>

Handles intents defined in the Alexa Skill Builder.



* Full name: \MayBeTall\Alexa\Endpoint\Intent



**See Also:**

* [Alexa Documentation On Intents](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interaction-model-reference#intent-schema-parameters)


### <a id='MayBeTall-Alexa-Endpoint-Intent-init'>init</a>


```php
Intent::init(object $intent)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$intent` | **object** | The object derived from Alexa's JSON payload |




---

### <a id='MayBeTall-Alexa-Endpoint-Intent-name'>name</a>
Get the name of the intent.

```php
Intent::name(): string
```



* This method is **static**.



**Return Value:**

The intent name



---

### <a id='MayBeTall-Alexa-Endpoint-Intent-slots'>slots</a>
Get the slots in the intent.

```php
Intent::slots(): object
```



* This method is **static**.



**Return Value:**

The slots in the intent



---

### <a id='MayBeTall-Alexa-Endpoint-Intent-hasSlot'>hasSlot</a>
Check if a slot exists in the intent.

```php
Intent::hasSlot(string $slot): boolean
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slot` | **string** | The name of the slot to check for. |


**Return Value:**

Returns true if the slot has a value, false otherwise.



---

### <a id='MayBeTall-Alexa-Endpoint-Intent-getSlot'>getSlot</a>
Gets the value of an intent slot.

```php
Intent::getSlot(string $slot): mixed
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slot` | **string** | The name of the slot to check for. |


**Return Value:**

The value of the intent slot, or null if not found.



---

### <a id='MayBeTall-Alexa-Endpoint-Intent-listen'>listen</a>


```php
Intent::listen(string $name, callable $callback)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** | The name of the intent to listen for. |
| `$callback` | **callable** | The callback function to run if the intent is called. |




---

## <a id='MayBeTall-Alexa-Endpoint-Request'>Request</a>

Handles the requests sent by the Alexa Skill.



* Full name: \MayBeTall\Alexa\Endpoint\Request



**See Also:**

* [Alexa's Request Format](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#request-format)


### <a id='MayBeTall-Alexa-Endpoint-Request-init'>init</a>
Parses the request sent by the Alexa Skill.

```php
Request::init()
```



* This method is **static**.





---

### <a id='MayBeTall-Alexa-Endpoint-Request-getPayload'>getPayload</a>
Gets the payload object

```php
Request::getPayload(): string
```



* This method is **static**.



**Return Value:**

The payload object sent by Alexa.



---

### <a id='MayBeTall-Alexa-Endpoint-Request-getAttributes'>getAttributes</a>
Gets the attributes object

```php
Request::getAttributes(): string
```



* This method is **static**.



**Return Value:**

The attributes sent by Alexa.



---

### <a id='MayBeTall-Alexa-Endpoint-Request-getType'>getType</a>
Gets the request type.

```php
Request::getType(): string
```



* This method is **static**.



**Return Value:**

The request type.



---

## <a id='MayBeTall-Alexa-Endpoint-Response'>Response</a>

Handles the JSON response given back to the Alexa skill.



* Full name: \MayBeTall\Alexa\Endpoint\Response



**See Also:**

* [Alexa Skill Response Format](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-format)


### <a id='MayBeTall-Alexa-Endpoint-Response-init'>init</a>
Inits/Resets the response.

```php
Response::init(object $sessionAttributes = null)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$sessionAttributes` | **object** | The session attributes received in the response. |




---

### <a id='MayBeTall-Alexa-Endpoint-Response-addSessionAttribute'>addSessionAttribute</a>
Adds a session attribute to the response.

```php
Response::addSessionAttribute(string $key, mixed $value)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$key` | **string** | The key used to retrieve the value later. |
| `$value` | **mixed** | The value to remember. |



**See Also:**

* [Alexa Skill Response Parameters](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-parameters)


---

### <a id='MayBeTall-Alexa-Endpoint-Response-addSessionAttributes'>addSessionAttributes</a>
Adds session attributes to the response.

```php
Response::addSessionAttributes( $values)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$values` | **** |  |



**See Also:**

* [Alexa Skill Response Parameters](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-parameters)


---

### <a id='MayBeTall-Alexa-Endpoint-Response-getSessionAttribute'>getSessionAttribute</a>
Gets session attributes.

```php
Response::getSessionAttribute(string $attribute): mixed
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attribute` | **string** | The attribute to get. |


**Return Value:**

The value of the attribute, or null if it didn't exist.



---

### <a id='MayBeTall-Alexa-Endpoint-Response-removeSessionAttribute'>removeSessionAttribute</a>
Removes a session attribute. Or all, if no argument is passed

```php
Response::removeSessionAttribute(string $attribute = null)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attribute` | **string** | The attribute to remove. |




---

### <a id='MayBeTall-Alexa-Endpoint-Response-append'>append</a>
Appends an object to the response body.

```php
Response::append(object $data)
```



* This method is **static**.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **object** | An object to be appended to the response body. |



**See Also:**

* [Alexa Skill Response Format](https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/alexa-skills-kit-interface-reference#response-format)


---

### <a id='MayBeTall-Alexa-Endpoint-Response-send'>send</a>
Sends the responce to the Alexa skill

```php
Response::send()
```



* This method is **static**.





---



--------
> This document was automatically generated from source code comments on 2017-04-28 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)