import hljs from "highlight.js/lib/core";
import javascript from "highlight.js/lib/languages/javascript";
import java from "highlight.js/lib/languages/java";
import python from "highlight.js/lib/languages/python";
import php from "highlight.js/lib/languages/php";
import c from "highlight.js/lib/languages/c";
import cpp from "highlight.js/lib/languages/cpp";
import ruby from "highlight.js/lib/languages/ruby";
import go from "highlight.js/lib/languages/go";
import swift from "highlight.js/lib/languages/swift";
import kotlin from "highlight.js/lib/languages/kotlin";
import typescript from "highlight.js/lib/languages/typescript";
import sql from "highlight.js/lib/languages/sql";
import html from "highlight.js/lib/languages/xml";
import css from "highlight.js/lib/languages/css";
import xml from "highlight.js/lib/languages/xml";
import json from "highlight.js/lib/languages/json";
import yaml from "highlight.js/lib/languages/yaml";
import bash from "highlight.js/lib/languages/bash";
import shell from "highlight.js/lib/languages/shell";
import plaintext from "highlight.js/lib/languages/plaintext";
import r from "highlight.js/lib/languages/r";
import dart from "highlight.js/lib/languages/dart";
import rust from "highlight.js/lib/languages/rust";
import dockerfile from "highlight.js/lib/languages/dockerfile";
import "highlight.js/styles/atom-one-dark-reasonable.min.css";
import useMediaQuery from "../hooks/useMediaQuery.js";

const languages = {
    javascript,
    java,
    python,
    php,
    c,
    cpp,
    ruby,
    go,
    swift,
    kotlin,
    typescript,
    sql,
    html,
    css,
    xml,
    json,
    yaml,
    bash,
    shell,
    plaintext,
    r,
    dart,
    rust,
    dockerfile,
};

Object.entries(languages).forEach(([name, lang]) => hljs.registerLanguage(name, lang));

const CodeBlockComp = ({language, code}) => {
    const highlightedCode = hljs.highlight(code, {language}).value;
    const isMobile = useMediaQuery('(max-width: 800px)')

    return (
        <div className={'radius-m'}
             style={{
                 overflow: 'auto',
                 paddingBottom: 25,
                 maxWidth: isMobile ? '88dvw' : 'calc(100dvw - 373px)',
                 backgroundColor: '#0e171f'
             }}>
            <p className={'capitalize p-m font-size-s font-medium'} style={{color: 'whitesmoke'}}>{language}</p>
            <pre>
                <code
                    className={`hljs language-${language}`}
                    dangerouslySetInnerHTML={{__html: highlightedCode}}
                />
            </pre>
        </div>
    );
};

export default CodeBlockComp;
