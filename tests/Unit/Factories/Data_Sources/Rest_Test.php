<?php

namespace Adiungo\Core\Tests\Unit\Factories\Data_Sources;


use Adiungo\Core\Abstracts\Content_Model;
use Adiungo\Core\Abstracts\Int_Id_Based_Request_Builder;
use Adiungo\Core\Factories\Data_Sources\Rest;
use Adiungo\Tests\Test_Case;
use JsonException;
use Mockery;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Underpin\Exceptions\Operation_Failed;
use Underpin\Factories\Request;

class Rest_Test extends Test_Case
{

    /**
     * @covers \Adiungo\Core\Factories\Data_Sources\Rest::make_request
     * @return void
     */
    public function test_can_make_request(): void
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \Adiungo\Core\Factories\Data_Sources\Rest::get_data
     * @return void
     */
    public function test_can_get_data(): void
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \Adiungo\Core\Factories\Data_Sources\Rest::has_more
     * @return void
     */
    public function test_has_more(): void
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \Adiungo\Core\Factories\Data_Sources\Rest::get_next
     * @return void
     */
    public function test_can_get_next(): void
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \Adiungo\Core\Factories\Data_Sources\Rest::get_item
     * @return void
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws Operation_Failed
     * @throws JsonException
     */
    public function test_can_get_item(): void
    {
        $instance = Mockery::mock(Rest::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $request = Mockery::mock(Request::class);
        $response = Mockery::mock(ResponseInterface::class);
        $builder = Mockery::mock(Int_Id_Based_Request_Builder::class);
        $expected = Mockery::mock(Content_Model::class);

        $builder->expects('set_id')->once()->andReturn($builder);
        $builder->expects('get_request')->once()->andReturn($request);

        $response->expects('getContent')->once()->andReturn('{"foo": "bar"}');

        $instance->expects('get_single_request_builder')->once()->andReturn($builder);
        $instance->expects('make_request')->with($request)->once()->andReturn($response);
        $instance->expects('get_data_source_adapter->convert_to_model')->once()->andReturn($expected);

        $this->assertSame($instance->get_item(123), $expected);
        // Run twice to confirm the data is cached and does not run more than once.
        $this->assertSame($instance->get_item(123), $expected);
    }

}