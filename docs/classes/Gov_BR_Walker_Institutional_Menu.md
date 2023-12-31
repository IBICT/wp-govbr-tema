***

# Gov_BR_Walker_Institutional_Menu

Class for custom menu walker.

This class is used to define a custom menu walker, with custom css classes.

* Full name: `\Gov_BR_Walker_Institutional_Menu`
* Parent class: [`Walker_Nav_Menu`](./Walker_Nav_Menu.md)




## Methods


### start_el

Starts the element output.

```php
public start_el(string& $output, object $data_object, int $depth, array $args = array(), int $current_object_id): mixed
```

The $args parameter holds additional values that may be used with the child
class methods. Also includes the element output.






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$output` | **string** | Used to append additional content (passed by reference). |
| `$data_object` | **object** | The data object. |
| `$depth` | **int** | Depth of the item. |
| `$args` | **array** | An array of additional arguments. |
| `$current_object_id` | **int** | Optional. ID of the current item. Default 0. |




***

### end_el

Ends the element output, if needed.

```php
public end_el(string& $output, object $data_object, int $depth, array $args = array()): mixed
```

The $args parameter holds additional values that may be used with the child class methods.






**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$output` | **string** | Used to append additional content (passed by reference). |
| `$data_object` | **object** | The data object. |
| `$depth` | **int** | Depth of the item. |
| `$args` | **array** | An array of additional arguments. |




***


***
> Automatically generated from source code comments on 2023-07-19 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
