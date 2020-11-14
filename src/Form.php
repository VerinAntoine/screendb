<?php
namespace App;

class Form {

    function validateRequire(array $inputs): bool {
        if(!isset($_POST)) return false;
        foreach($inputs as $input) {
            if(empty($_POST[$input])) return false;
        }
        return true;
    }

    function input(string $type, string $name, string $label, $value): string {
        return <<< HTML
        <div class="my-2">
            <label for="{$name}" class="block ml-1 text-gray-800 text-sm">{$label}</label>
            <input type="{$type}" name="{$name}" class="p-1 px-2 bg-gray-300 w-full rounded focus:outline-none" value="{$value}">
        </div>
        HTML;
    }

    function textArea(string $name, string $label, $value): string {
        return <<< HTML
        <div class="my-2">
            <label for="{$name}" class="block ml-1 text-gray-800 text-sm">{$label}</label>
            <textarea type="text" name="{$name}" class="p-1 px-2 bg-gray-300 w-full h-48 rounded resize-none focus:outline-none">{$value}</textarea>
        </div>
        HTML;
    }

    function button(string $name): string {
        return <<< HTML
        <button class="bg-purple-500 hover:bg-purple-400 text-white border-b-4 border-purple-600 hover:border-purple-500 py-2 px-4 rounded">{$name}</button>
        HTML;
    }

}
