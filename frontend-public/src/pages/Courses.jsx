import CourseCardComp from "../components/CourseCardComp.jsx";
import {useTranslation} from "react-i18next";
import SvgComp from "../components/SvgComp.jsx";
import {useEffect} from "react";
import PaginationComp from "../components/PaginationComp.jsx";
import {useCustomNavigate} from "../utils/Helper.js";
import NoDataComp from "../components/NoDataComp.jsx";
import CourseCardSkeletonComp from "../components/CourseCardSkeletonComp.jsx";
import usePublic from "../hooks/usePublic.js";
import useMediaQuery from "../hooks/useMediaQuery.js";

export default function Courses() {
    const isMobile = useMediaQuery('(max-width: 800px)')
    const {t} = useTranslation();
    const {
        courses,
        page, setPage,
        sort, setSort,
        level, setLevel,
        status, setStatus,
        keyword, setKeyword,
        loading,
        fetchCourses, searchCourses
    } = usePublic();

    useEffect(() => {
        fetchCourses()
    }, [page, sort, level, status]);

    const handleSearch = () => {
        (async () => {
            if (keyword.trim() !== '') {
                await searchCourses()
            } else {
                await fetchCourses()
            }
        })()
    };

    const navigate = useCustomNavigate();

    const handleSeeDetail = (id) => {
        navigate('/course#top', {id});
    }
    return (
        <>
            <div className={'card-wrapper replace-shadow-with-border mb-x'}>
                <p className={'font-medium'}>Filter</p>
                <div className={'gap-m'}
                     style={{
                         display: 'grid',
                         gridTemplateColumns: isMobile ? '1fr' : '2fr 1fr'
                     }}>
                    <div className={'max-width-700 ps-center flex-aic-jcs flex-nowrap gap-m'}>
                        <input list="search" type="search" placeholder="..." name="search"
                               onChange={e => setKeyword(e.target.value)}/>
                        <datalist id="search">
                            <option value="PHP"/>
                            <option value="Docker"/>
                            <option value="C++"/>
                            <option value="SQL"/>
                            <option value="Python"/>
                        </datalist>
                        <div className={'cursor-pointer'} onClick={handleSearch}>
                            <SvgComp rule={'svg-m fill-text fill-blue-hover'} file={'sprite'} icon={'search'}/>
                        </div>
                    </div>
                    <div style={{display:'grid', gridTemplateColumns: 'repeat(3, 1fr)'}} className={'gap-m'}>
                        <select className={'max-width-300'} value={level} onChange={e => {
                            setPage(1);
                            setLevel(e.target.value)
                        }}>
                            <option value="" disabled>Level</option>
                            <option value={'junior'}>Junior</option>
                            <option value={'middle'}>Middle</option>
                            <option value={'senior'}>Senior</option>
                            <option value={'all'}>All</option>
                        </select>
                        <select className={'max-width-300'} value={status} onChange={e => {
                            setPage(1);
                            setStatus(e.target.value);
                        }}>
                            <option value="" disabled>Status</option>
                            <option value={'paid'}>Paid</option>
                            <option value={'free'}>Free</option>
                            <option value={'all'}>All</option>
                        </select>
                        <select className={'max-width-300'} value={sort} onChange={e => {
                            setPage(1);
                            setSort(e.target.value);
                        }}>
                            <option value="" disabled>Sort</option>
                            <option value={'old'}>Old</option>
                            <option value={'new'}>New</option>
                        </select>
                    </div>
                </div>
            </div>

            {loading ? <CourseCardSkeletonComp/> :
                <div className={'card-layout'}>
                    {courses?.data?.length > 0 ? courses?.data?.map((value, index) => (
                        <CourseCardComp key={index} title={value.title} instructor={value.instructor}
                                        image={value.image} editor={value.editor} price={value.price}>
                            <div className={'card-wrapper-actions'}>
                                <div className={'text-primary'}
                                     onClick={() => handleSeeDetail(value.id)}>{t('detail')}</div>
                            </div>
                        </CourseCardComp>
                    )) : <NoDataComp message={t('data_not_found')}/>}
                </div>}

            {!loading && <PaginationComp data={courses.meta?.links} onPageChange={page => setPage(page)}/>}
        </>
    )
}