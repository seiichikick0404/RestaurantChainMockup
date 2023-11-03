<?php

namespace Models;

interface FileConvertible {
    public function toString(): string;

    public function toHtml(): string;

    public function toMarkdown(): string;

    public function toArray(): array;
}