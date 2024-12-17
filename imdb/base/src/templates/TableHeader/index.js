import React from "react";

const TableHeader = ({ title, children }) =>{
    return (<div style={{ marginBottom:'15px', paddingBottom:'8px', fontFamily:'Poppins', fontSize:'16px', borderBottom:'1px solid #ccc' }}><b>{title}</b>
    <span className="pull-right">{children}</span>
    </div>);
};

export default TableHeader;