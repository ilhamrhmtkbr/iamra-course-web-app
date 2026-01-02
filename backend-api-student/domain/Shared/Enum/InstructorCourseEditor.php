<?php

namespace Domain\Shared\Enum;

enum InstructorCourseEditor: string
{
    case JAVASCRIPT = 'javascript';
    case JAVA = 'java';
    case PYTHON = 'python';
    case PHP = 'php';
    case C = 'c';
    case CPP = 'cpp';
    case RUBY = 'ruby';
    case GO = 'go';
    case SWIFT = 'swift';
    case KOTLIN = 'kotlin';
    case TYPESCRIPT = 'typescript';
    case SQL = 'sql';
    case HTML = 'html';
    case CSS = 'css';
    case XML = 'xml';
    case JSON = 'json';
    case YAML = 'yaml';
    case BASH = 'bash';
    case SHELL = 'shell';
    case PLAINTEXT = 'plaintext';
    case R = 'r';
    case DART = 'dart';
    case RUST = 'rust';
}
