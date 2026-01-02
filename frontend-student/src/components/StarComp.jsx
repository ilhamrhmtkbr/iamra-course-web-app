import {memo} from "react";

const StarRating = memo(({rating}) => {
    const filled = Math.floor(rating / 2); // ★
    const hasHalf = rating % 2 >= 1;       // ⯪
    const empty = 5 - filled - (hasHalf ? 1 : 0); // ☆

    const stars =
        '★'.repeat(filled) +
        (hasHalf ? '⯪' : '') +
        '☆'.repeat(empty);

    return (
        <span className="text-warning">
      {stars}
    </span>
    );
})

export default StarRating