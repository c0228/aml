import React from "react";
import { ContainerFluid, Row, Col, Card, TextBox, Form   } from "e-ui-react";
import Header from '@Templates/Header/index.js';
import { HeaderMenu } from '@Config/HeaderMenu.js';
import TableHeader from '@Templates/TableHeader/index.js';

const ManageTopics = () =>{
 return (<div>
  <Header menulinks={HeaderMenu} activeId="ManageTopics" />
  <ContainerFluid>
  <Row>
    <Col md={4}>
        <div className="mtop15p">
        <Card padding={15}>
        <Form name="testForm" btnSubmit={{
              btnType:'primary',
              align:'right',
              label:(<div><b>Create New Topic</b></div>),
              size: 10
            }} 
            onSubmit={(form, isValidForm)=>{ }}>
            <TableHeader title="Add New Topic" />
            <TextBox name="topicName" label="Topic Name" placeholder="Enter Topic Name" />
            </Form>
        </Card>
        </div>
    </Col>
    <Col md={8}>
        <div className="mtop15p">
            <TableHeader title="List of Topics" />
        </div>
    </Col>
  </Row>
  </ContainerFluid>
 </div>);
};

export default ManageTopics;