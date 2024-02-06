import React from "react";
import Header from '@Templates/Header/index.js';
import { HeaderMenu } from '@Config/HeaderMenu.js';
import { ContainerFluid, Row, Col } from 'e-ui-react';

const Home = ()=>{
 return (<>
 <ContainerFluid>
    <Row>
        <Col xl={8} xxl={8}>
            <Header menulinks={HeaderMenu} activeId="Home" />
        </Col>
        <Col xl={4} xxl={4}>

        </Col>
    </Row>
 </ContainerFluid>
 </>);
};

export default Home;