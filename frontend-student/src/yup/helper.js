import * as yup from "yup";

const kataKasar = [
    'anjing', 'babi', 'bangsat', 'kontol', 'memek', 'goblok', 'tolol', 'kampret',
    'tai', 'brengsek', 'jancok', 'setan', 'asu', 'monyet', 'sinting', 'idiot',
    'keparat', 'laknat', 'biadab', 'cocot', 'perek', 'pepek', 'lonte', 'kimak',
    'fuck', 'bitch', 'shit', 'bastard', 'dumbass', 'motherfucker'
];

function mengandungKataKasar(text) {
    if (!text) return [false, ""];

    const normalizedText = text.toLowerCase().trim();

    for (const badWord of kataKasar) {
        if (normalizedText.includes(badWord)) {
            return [true, normalizedText];
        }
    }

    return [false, ""];
}

const profanityTest = t => ({
    name: "no-profanity",
    message: params => {
        const [hasBadWord, sentence] = mengandungKataKasar(params.value || "");
        return hasBadWord ? t("validation.no_profanity_sentence", {sentence}) : t("validation.no_profanity");
    },
    test: value => {
        const [hasBadWord, sentence] = mengandungKataKasar(value || "");
        return !hasBadWord;
    }
});

export const withAttribute = (key, t, fieldKey, params = {}) =>
    t(key, {attribute: t(fieldKey), ...params});

export const minMaxValidation = (t, fieldKey, min = 2, max = 33) =>
    yup.string()
        .required(withAttribute("validation.required", t, fieldKey))
        .min(min, withAttribute("validation.min", t, fieldKey, {min}))
        .max(max, withAttribute("validation.max", t, fieldKey, {max}))
        .test(profanityTest(t));
