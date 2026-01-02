import {memo} from "react";

const CourseCardSkeletonComp = memo(({count = 4}) => {
    return (
        <div className={'card-layout'}>
            {Array.from({length: count}).map((_, index) => (
                <article className={'border-style-default radius-m max-width-500'}
                         style={{
                             display: 'grid',
                             gridTemplateRows: '212px 1fr'
                         }}
                         key={index}>
                    <img className={'radius-s object-fit-cover w-full loading-pulse'}
                         style={{
                             height: '-webkit-fit-content'
                         }}
                         alt={'course-images'}/>
                    <div className={'box-border p-m'}
                         style={{
                             display: 'grid',
                             gridTemplateRows: '1fr repeat(2, max-content)'
                         }}>
                        <p className={'font-medium font-size-l loading-pulse'}
                           style={{
                               height: 20
                           }}></p>
                        <p className={'font-light loading-pulse'}
                           style={{
                               height: 40,
                               marginTop: 7
                           }}></p>
                    </div>
                </article>
            ))}
        </div>
    )
})

export default CourseCardSkeletonComp;