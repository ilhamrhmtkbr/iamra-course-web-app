import {useLocation} from "react-router";
import {HashLink} from "react-router-hash-link";
import {Fragment} from "react";

const BreadcrumbsComp = () => {
    const location = useLocation();
    const pathNames = location.pathname.split("/").filter(x => x);

    return (
        <div className={'breadcrumb'}>
            <HashLink className={'breadcrumb-item'} smooth to={'/'}>
                Profile
            </HashLink>
            {pathNames.map((value, index) => {
                const to = `/${pathNames.slice(0, index + 1).join("/")}`;

                if(pathNames.length - 1 === index) {
                    return (
                        <Fragment key={index}>
                            <span>&#8250;</span>
                            <div
                                 className={'breadcrumb-item active'}>
                                {value}
                            </div>
                        </Fragment>
                    )
                } else {
                    return (
                        <Fragment key={index}>
                            <span>&#8250;</span>
                            <HashLink className={'breadcrumb-item'}
                                      smooth
                                      to={to}>
                                {value}
                            </HashLink>
                        </Fragment>
                    )
                }
            })}
        </div>
    )
}

export default BreadcrumbsComp;