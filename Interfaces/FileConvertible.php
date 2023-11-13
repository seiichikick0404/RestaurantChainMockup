<?php

namespace Interfaces;

interface FileConvertible {
    public function toString(): string;

    public function toHtml(): string;

    public function toMarkdown(): string;

    public function toArray(): array;
}