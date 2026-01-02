import * as yup from "yup";
import {minMaxValidation, withAttribute} from "./helper.js";

export const questionUpsertSchema = t =>
    yup.object().shape({
        question: minMaxValidation(t, "question", 5, 350)
    })

export const reviewUpsertSchema = t =>
    yup.object().shape({
        review: minMaxValidation(t, "review", 10, 300),
        rating: yup.number()
            .typeError(t('validation.must_be_number'))
            .required()
            .min(1, withAttribute("validation.min", t, "rating", {min: 1}))
            .max(10, withAttribute("validation.max", t, "rating", {max: 10}))
    })