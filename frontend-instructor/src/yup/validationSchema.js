import * as yup from "yup";
import {withAttribute, minMaxValidation, profanityTest} from "./helper.js";
import {dataBanks} from "../utils/Helper.js";

const editor = ['javascript', 'java', 'python', 'php', 'c', 'cpp', 'ruby', 'go', 'swift', 'kotlin', 'typescript', 'sql', 'html', 'css', 'xml', 'json', 'yaml', 'bash', 'shell', 'plaintext', 'r', 'dart', 'rust'];

export const courseSchema = t =>
    yup.object().shape({
        title: minMaxValidation(t, "title", 3, 100),
        description: minMaxValidation(t, "description", 3, 325),
        image: yup.string()
            .nullable()
            .test(
                "fileSize",
                t("validation.max_image_size", { maxMB: 3 }),
                (value) => {
                    if (!value) return true;

                    try {
                        // Ambil bagian setelah koma jika ada prefix data:image/xxx;base64,
                        const base64 = value.includes(',') ? value.split(',')[1] : value;
                        // Hitung padding (= atau ==)
                        const padding = (base64.endsWith('==')) ? 2 : (base64.endsWith('=')) ? 1 : 0;
                        // Hitung ukuran asli file (dalam byte)
                        const sizeInBytes = (base64.length * 3) / 4 - padding;
                        // Bandingkan dengan 3MB
                        return sizeInBytes <= 3 * 1024 * 1024;
                    } catch {
                        return false;
                    }
                }
            ),
        price: yup
            .string()
            .required(withAttribute("validation.required", t, "price")),
        level: yup
            .string()
            .required(withAttribute("validation.required", t, "level"))
            .oneOf(['junior', 'middle', 'advanced'], withAttribute("validation.enum", t, "level", {enum: 'junior, middle, senior'})),
        status: yup
            .string()
            .required(withAttribute("validation.required", t, "level"))
            .oneOf(['paid', 'free'], withAttribute("validation.enum", t, "status", {enum: 'paid, free'})),
        visibility: yup
            .string()
            .required(withAttribute("validation.required", t, "level"))
            .oneOf(['public', 'private'], withAttribute("validation.enum", t, "visibility", {enum: 'public, private'})),
        notes: yup
            .string()
            .nullable()
            .min(3, withAttribute("validation.min", t, "notes", {min: 3}))
            .max(150, withAttribute("validation.max", t, "notes", {max: 150}))
            .test(profanityTest(t)),
        requirements: yup
            .string()
            .nullable()
            .min(3, withAttribute("validation.min", t, "notes", {min: 3}))
            .max(325, withAttribute("validation.max", t, "notes", {max: 325}))
            .test(profanityTest(t)),
        editor: minMaxValidation(t, "editor", 1, 45)
            .oneOf(editor, withAttribute("validation.enum", t, "editor", {enum: editor.join(', ')}))
    })

export const sectionSchema = t =>
    yup.object().shape({
        title: minMaxValidation(t, "title", 5, 100),
        order_in_course: minMaxValidation(t, "order_in_course", 1, 200),
    })

export const lessonSchema = t =>
    yup.object().shape({
        title: minMaxValidation(t, "title", 5, 100),
        description: minMaxValidation(t, "description", 15, 200),
        code: minMaxValidation(t, "code", 40, 1000),
        order_in_section: minMaxValidation(t, "order_in_section", 1, 100),
    })

export const answerSchema = t =>
    yup.object().shape({
        answer: minMaxValidation(t, "answer", 5, 250)
    })

export const accountSchema = t =>
    yup.object().shape({
        account_id: minMaxValidation(t, "account", 6, 20)
            .matches(/^\d+$/, "Account ID must be numeric"),
        bank_name: yup
            .string()
            .required(withAttribute("validation.required", t, "bank_name"))
            .oneOf(Object.keys(dataBanks), withAttribute("validation.enum", t, "bank_name", {enum: Object.keys(dataBanks).join(', ')})),
        alias_name: minMaxValidation(t, "alias_name", 5, 20)
    })

const twoDaysFromNow = new Date();
twoDaysFromNow.setDate(twoDaysFromNow.getDate() + 2);
export const couponSchema = t =>
    yup.object().shape({
        discount: yup
            .number()
            .typeError(withAttribute("validation.number", t, "discount"))
            .required(withAttribute("validation.required", t, "discount")),
        max_redemptions: yup
            .number()
            .typeError(withAttribute("validation.number", t, "max_redemptions"))
            .required(withAttribute("validation.required", t, "max_redemptions")),
        expiry_date: yup
            .date()
            .typeError(withAttribute("validation.date", t, "expiry_date"))
            .required(withAttribute("validation.required", t, "expiry_date"))
            .min(twoDaysFromNow, withAttribute("validation.date-min", t, "expiry_date"))
    });

export const socialSchema = t =>
    yup.object().shape({
        url_link: minMaxValidation(t, "url_link", 10, 145),
        display_name: minMaxValidation(t, "display_name", 10, 145)
    })