import {HashLink} from "react-router-hash-link";
import {getPage} from "../utils/Helper.js";
import {memo} from "react";

const PaginationComp = memo(({ data, onPageChange }) => {

    function handlePageClick(value) {
        if (value.url !== null) {
            let url = getPage(value.url)
            onPageChange(url);
        }
    }

    return (
        data && data.length > 3 && <div className='pagination ps-center'>
            {data.map((value, index) => (
                <HashLink
                    smooth
                    to={'#top'}
                    className={`pagination-item ${value.active && 'active'}`}
                    key={index}
                    onClick={() => handlePageClick(value)}
                >
                    {value.label.includes('la') ? '<' : value.label.includes('ra') ? '>' : value.label}
                </HashLink>
            ))}
        </div>
    )
})

export default PaginationComp