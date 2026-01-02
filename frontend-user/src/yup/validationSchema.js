import * as yup from "yup";
import {minMaxValidation, withAttribute} from "./helper.js";

export const registerSchema = (t) =>
    yup.object().shape({
        first_name: minMaxValidation(t, "first_name"),
        middle_name: minMaxValidation(t, "middle_name"),
        last_name: minMaxValidation(t, "last_name"),
        username: minMaxValidation(t, "username", 5, 45)
            .matches(/^[a-z]+$/, withAttribute("validation.only_lowercase", t, "username")),
        password: minMaxValidation(t, "password", 5,20)
            .matches(/[a-z]/, withAttribute("validation.letters", t, "password"))
            .matches(/[A-Z]/, withAttribute("validation.uppercase", t, "password"))
            .matches(/[0-9]/, withAttribute("validation.numbers", t, "password"))
            .matches(/[^a-zA-Z0-9]/, withAttribute("validation.symbols", t, "password")),
        password_confirmation: minMaxValidation(t, "password_confirmation", 5, 20)
            .oneOf(
                [yup.ref("password")],
                t("validation.passwords_must_match", {attribute: t("password_confirmation")})
            )
    });

export const loginSchema = t =>
    yup.object().shape({
        username: minMaxValidation(t, "username", 5, 45)
            .matches(/^[a-z]+$/, withAttribute("validation.only_lowercase", t, "username")),
        password: minMaxValidation(t, "password", 5,20)
            .matches(/[a-z]/, withAttribute("validation.letters", t, "password"))
            .matches(/[A-Z]/, withAttribute("validation.uppercase", t, "password"))
            .matches(/[0-9]/, withAttribute("validation.numbers", t, "password"))
            .matches(/[^a-zA-Z0-9]/, withAttribute("validation.symbols", t, "password")),
    });

export const memberUpdateAdditionalInfoSchema = t =>
    yup.object().shape({
        first_name: minMaxValidation(t, "first_name"),
        middle_name: minMaxValidation(t, "middle_name"),
        last_name: minMaxValidation(t, "last_name"),
        image: yup.string().nullable().notRequired()
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
        dob: yup
            .string()
            .required(t("validation.required", { attribute: t("dob") }))
            .test("is-valid-date", t("validation.date", { attribute: t("dob") }), (value) => {
                return !isNaN(Date.parse(value));
            })
            .test("not-future", t("validation.not_in_future", { attribute: t("dob") }), (value) => {
                return new Date(value) <= new Date();
            }),
        address: minMaxValidation(t, "address", 10, 100),
    });

export const memberUpdateAuthenticationSchema = t =>
    yup.object().shape({
        username: minMaxValidation(t, "username", 5, 45)
            .matches(/^[a-z]+$/, withAttribute("validation.only_lowercase", t, "username")),
        old_password: minMaxValidation(t, "old_password", 5,20)
            .matches(/[a-z]/, withAttribute("validation.letters", t, "old_password"))
            .matches(/[A-Z]/, withAttribute("validation.uppercase", t, "old_password"))
            .matches(/[0-9]/, withAttribute("validation.numbers", t, "old_password"))
            .matches(/[^a-zA-Z0-9]/, withAttribute("validation.symbols", t, "old_password")),
        new_password: minMaxValidation(t, "new_password", 5,20)
            .matches(/[a-z]/, withAttribute("validation.letters", t, "new_password"))
            .matches(/[A-Z]/, withAttribute("validation.uppercase", t, "new_password"))
            .matches(/[0-9]/, withAttribute("validation.numbers", t, "new_password"))
            .matches(/[^a-zA-Z0-9]/, withAttribute("validation.symbols", t, "new_password")),

    })

export const memberUpdateEmailSchema = t =>
    yup.object().shape({
        email: yup.string()
            .required(t("validation.required", { attribute: t("email") }))
            .email(t("validation.email", { attribute: t("email") }))
    })

export const instructorUpdateCreateSchema = t =>
    yup.object().shape({
        role: yup.string().required(),
        resume: yup
            .mixed()
            .nullable()
            .test('fileSize', t('validation.max_file', { max: '2MB' }), (file) => {
                if (!file) return true;
                return file.size <= 2 * 1024 * 1024;
            })
            .test('fileType', t('validation.invalid_file_type'), (file) => {
                if (!file) return true;
                return [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ].includes(file.type);
            }),
        summary: minMaxValidation(t, "summary", 5, 200)
    })

export const studentUpdateCreateSchema = t =>
    yup.object().shape({
        role: yup.string().required(),
        category: yup.string()
            .required()
            .oneOf(['learner', 'employee', 'jobless', 'undefined'], t('validation.enum', {enum: 'learner,employee,jobless,undefined'})),
        summary: minMaxValidation(t, "summary", 5, 200)
    })